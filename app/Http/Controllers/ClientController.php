<?php

namespace App\Http\Controllers;

use App\Http\Requests\AutorizeRequest;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Requests\Client\StoreRequest;
use App\Http\Requests\Client\UpdateRequest;
use App\Models\ArlAffiliate;
use App\Models\City;
use App\Models\CompanyPaymentDate;
use App\Models\ContactInformation;
use App\Models\ContractType;
use App\Models\CustomerPaymentDate;
use App\Models\EmploymentInformation;
use App\Models\EpsAffiliate;
use App\Models\LevelStudy;
use App\Models\Loan;
use App\Models\MaritalStatus;
use App\Models\PaymentFrecuency;
use App\Models\PhoneType;
use App\Models\QualityHolder;
use App\Models\State;
use App\Models\Warranty;

class ClientController extends Controller
{
    protected $QualityHolder;
    protected $ArlAffiliates;
    protected $EpsAffiliates;
    protected $CompanyPaymentDates;
    protected $CustomerPaymentDates;
    protected $PaymentFrecuencies;
    protected $ContractTypes;    
    protected $studylevels;     
    protected $maritalstatus;
    protected $phonetypes;
    protected $clients;
    protected $Warranties;
    protected $States; 
    protected $cities;
    function __construct() {
        $this->cities=City::all();
       $this-> QualityHolder=QualityHolder::all();
     $this-> ArlAffiliates=ArlAffiliate::all();
     $this->EpsAffiliates=EpsAffiliate::all();
     $this->CompanyPaymentDates=CompanyPaymentDate::all();
     $this->CustomerPaymentDates=CustomerPaymentDate::all();
     $this->PaymentFrecuencies=PaymentFrecuency::all();
     $this->ContractTypes=ContractType ::all();
     $this->studylevels=LevelStudy::all();     
     $this->maritalstatus =MaritalStatus::all();
     $this->phonetypes=PhoneType::all();
     $this->Warranties=Warranty::all();
     $this->States =State::all();
     $this->clients=Client::select('clients.id',
                                   'clients.reference', 
                                   'q.name as quality_holder',
                                   'clients.value_Title',
                                   'name_last_name',
                                   'clients.identification',
                                   'clients.date_birth',
                                   'clients.expedition_date',
                                   'clients.address',
                                   'clients.email',
                                   'clients.neighborhood',
                                   'ms.name as marital_status',         
                                   'einf.nit_company_work as nit',
                                   'einf.Company_works' ,
                                   'einf.main_address' ,
                                   'einf.company_on_mission',
                                   'einf.nit' ,
                                   'einf.branch_address',
                                   'einf.entry_date' ,
                                   'einf.average_monthly_salary',
                                   'einf.current_position',
                                   'fp.name as payment_frequency',
                                   'cpd.name as company_payment_date',
                                   'cuspd.name as customer_payment',
                                   'ctrtype.name as contract_type',
                                   'eps.name as eps_affiliate', 
                                   'arl.name as arl_affiliate',
                                   'ls.name as level_study',
                                   'clients.vehicle',
                                   'clients.estate',                                   
                                   'loans.ammount',
                                   'loans.term',
                                   'w.name as warranty',     
                                   'clients.created_at')
                                ->selectRaw("CASE WHEN clients.seizure =1 THEN concat('SI',' ',clients.company_seizure) ELSE 'NO' END as seizure")                                   
                                ->selectRaw("(SELECT
                                              GROUP_CONCAT(CONCAT (pt.name,': ', ci.phone_number) separator '; ')                                              
                                              FROM                                              
                                              contact_informations ci	JOIN `phone_types` pt ON pt.id=ci.phone_type_id                                              
                                              where ci.client_id=clients.id)as contact_informations")
                                ->leftjoin("quality_holders as q","q.id","=","quality_holder_id")         
                                ->join("marital_status as ms","ms.id","=","marital_status_id")                               
                                ->join("level_studies as ls","ls.id","=","clients.level_study_id")
                                ->leftjoin("employment_informations as einf","clients.id","=","einf.client_id")
                                ->leftjoin("eps_affiliates as eps","eps.id","=","einf.eps_affiliate_id" )
                                ->leftjoin("arl_affiliates as arl","arl.id","=","einf.arl_affiliate_id")
                                ->leftjoin("payment_frequency as fp","fp.id","=","einf.payment_frequency_id")
                                ->leftjoin("company_payment_dates as cpd","cpd.id","=","einf.company_payment_date_id")
                                ->leftjoin("customer_payment_dates as cuspd","cuspd.id","=","einf.customer_payment_date_id")
                                ->leftjoin("contract_types as ctrtype","ctrtype.id","=","einf.contract_type_id")                                
                                ->leftjoin("loans","clients.id","=","loans.client_id" )
                                ->leftjoin("warranties as w","w.id","=","loans.warranty_id");
    }
    public function UpdateLawInformation(Request $request ,$id)
    {
        $seizure=$request->seizure==null?0:(bool)$request->seizure;
        if($seizure==1 && ($request->company_seizure==null || trim($request->company_seizure)==""))
        {
            return redirect()->to(url('/clients/create'))                                                                                     
                             ->withErrors('Debe ingresar la empresa que tiene el embargo');        
        }
        $client=Client::find($id);
        if($client==null)
        {
            return redirect()->to(url('/clients/create'))                            
                             ->withErrors('No se ha encontrado el cliente');        
        }
        $client->seizure=$seizure; 
        $client->company_seizure=$request->company_seizure;      
        $client->update();
        session(["info"=>"law"]);
        session(['client' => $client]);         
        return back();
       // return redirect()->to(url('/clients/create'))->withInput(["client_id"=>$client->id]);
    }
    public function UpdatePatrimonialInformation(Request $request ,$id)
    {
        $client=Client::find($id);
        if($client==null)
        {
            return redirect()->to(url('/clients/create'))
                             ->withInput(["client_id"=>$id])
                             ->withErrors('No se ha encontrado el cliente');        
        }
        $client->vehicle=$request->vehicle==null?0:(bool)$request->vehicle;
        $client->estate=$request->estate==null?0:(bool)$request->estate;
        $client->update();
        session(["info"=>"patrimonial"]);
        session(['client' => $client]);         
      //  return redirect()->to(url('/clients/create'))->withInput(["client_id"=>$client->id]);
      return back();

    }
    /**
     * Display a listing of the resource.
     */
    public function index(AutorizeRequest $request)
    {                             
        $data=['clients'=>$this-> clients->get()];       
        return view('Client.index',$data);
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {     
        $client=session()->has('client')?session('client'):null;
        $contactInfos=ContactInformation::where ('client_id',$client?->id);
        $EmploymentInformation=EmploymentInformation::where ('client_id',$client!=null?$client->id:0)->first();            
        $loan=Loan::where('client_id',$client!=null?$client->id:0)->first();
        $info=session()->has("info")?session('info'):'client';
        $data=[
           'client'=>$client,
           'contactInfos'=>$contactInfos->get(),
           'EmploymentInformation'=>$EmploymentInformation,
           'loan'=>$loan,
            'QualityHolder'=>$this-> QualityHolder,
            'ArlAffiliates'=>$this-> ArlAffiliates,
            'EpsAffiliates'=>$this-> EpsAffiliates,
            'cities'=>$this->cities,
            'info'=>$info,
            'CompanyPaymentDates'=>$this-> CompanyPaymentDates,            
            'CustomerPaymentDates'=>$this-> CustomerPaymentDates,            
            'PaymentFrecuencies'=>$this-> PaymentFrecuencies,            
            'ContractTypes'=>$this-> ContractTypes,
            'maritalstatus'=>$this-> maritalstatus,          
            'phonetypes'=>$this-> phonetypes,
            'studylevels'=>$this-> studylevels,
            'Warranties'=>$this->Warranties,
            'States'=>$this->States,
        ];
        return view("Client.create",$data );
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {       
        $arrclient=[
            'identification'=>$request->identification,
            'name_last_name'=>$request->name_last_name,        
            'phone'=>$request->phone,
            'address'=>$request->address,
            'email'=>$request->email,
            'reference'=>$request->reference,        
            'value_Title'=>$request->value_Title,
            'date_birth'=>$request->birth_date,
            'expedition_date'=>$request->expedition_date,
            'neighborhood'=>$request->neighborhood,
            'vehicle'=>$request->vehicle==null?0:(bool)$request->vehicle ,
            'estate'=>$request->estate==null?0:(bool)$request->estate,
            'seizure'=>$request->seizure==null?0:(bool)$request->seizure,
            'quality_holder_id'=>$request->quality_holder,
            'marital_status_id'=>$request->marital_status,
            'level_study_id'=>$request->study_level
        ];        
        $client = Client::create($arrclient);      
        session(['client' => $client]);         
        session(["info"=>"client"]);
        return redirect()->to(url('/clients/create'));
       
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return response()->json(Client::find($id));
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( AutorizeRequest $request,int $id)
    {
        $contactInfos=ContactInformation::where('client_id',$id );
        $client=Client::find($id);
        $EmploymentInformation=EmploymentInformation::where ('client_id',$client->id)->first();            
        $loan=Loan::where('client_id',$client!=null?$client->id:0)->first();
        $data=[
            'cities'=>$this->cities,
           'client'=>$client,
           'contactInfos'=>$contactInfos->get(),
           'EmploymentInformation'=>$EmploymentInformation,
           'loan'=>$loan,
            'QualityHolder'=>$this-> QualityHolder,
            'ArlAffiliates'=>$this-> ArlAffiliates,
            'EpsAffiliates'=>$this-> EpsAffiliates,
            'CompanyPaymentDates'=>$this-> CompanyPaymentDates,            
            'CustomerPaymentDates'=>$this-> CustomerPaymentDates,            
            'PaymentFrecuencies'=>$this-> PaymentFrecuencies,            
            'ContractTypes'=>$this-> ContractTypes,
            'maritalstatus'=>$this-> maritalstatus,          
            'phonetypes'=>$this-> phonetypes,
            'studylevels'=>$this-> studylevels,
            'Warranties'=>$this->Warranties,
            'States'=>$this->States,
        ];        
        return view ('Client.edit',$data);
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, $id)
    {
       // print_r($request->all());
        //exit;
        $client = Client::find($id);
        $client->update($request->all());
        session(['client' => $client]);
        return back();


        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $client = Client::find($id);
        $client->delete();  
        //
    }
}
