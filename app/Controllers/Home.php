<?php

namespace App\Controllers;
use App\Models\Villas;
use App\Models\Users;
use App\Models\Features;
use App\Models\VillaContent;
use App\Models\Booking;
use Config\Services;

class Home extends BaseController
{
    protected $Villas;

    public function __construct()
    {
        $this->Villas = new Villas(); // Initialize the Villas model
    }
    public function index(){
        helper('number');
        $villa_model = new Villas();
        $villa = $villa_model->get_available_villas();
        return view('index', ['villa' => $villa]);
    }
    public function details($id){
        helper('number');
        $features = new Features();
		$villa = new Villas();
		$villaContent = new VillaContent();
        $data = [
			'features' => $features->where('id_villa',$id)->find(),
			'villaContent' => $villaContent->where('id_villa',$id)->first(),
			'villa' => $villa->where('id',$id)->first(),
		];
        return view('users-detail-villa',$data);
    }
    public function ListVilla(){
        helper('number');
        $villa = new Villas();
		$data = [
            'villa' => $villa->orderBy('created_at','desc')->paginate(6,'villa'),
            'pager' => $villa->pager
        ];
        return view('users-list-villa', $data);
    }
    public function updateProfile($id){
        $user = new Users();
        $data = [
			'user' => $user->where('id',$id)->first(),
        ];
        return view('user-update-profile', $data);
    }
    public function PostUpdate($id){
        $YourModel = model('Users');

		// Get the existing data for the record being updated
		$YourModel->find($id);

		// Get the form data
		$data = [
			'username' => $this->request->getPost('username'),
			'name' => $this->request->getPost('name'),
			'address' => $this->request->getPost('address'),
			'no_wa' => $this->request->getPost('no_wa'),
		];

        $rules = [
            'no_wa' => [
                'label' => 'no_wa',
                'rules' => 'required|regex_match[/^\+\d{1,3}\d{9,}$/]',
                'errors' => [
                    'regex_match' => 'The telephone number must be a valid phone number with a country code.',
                ],
            ],
        ];

        // Validate the input data
        $validation = Services::validation();
        $validation->setRules($rules);
         
        if($this->validate($rules)){
            // Update the record
            $YourModel->update($id, $data);
        
            // Redirect to the dashboard page with a success message
            session()->setFlashdata('success', 'Profile Updated Successfully');
            return redirect()->to('/dashboard');
        }else if(!$validation->run($data)){

            // If validation fails, get the validation errors
            $errors = $validation->getErrors();

            // Convert the errors array into a string
            $errorString = '';
            foreach ($errors as $error) {
                $errorString .= $error;
            }

            // Return the error message using SweetAlert
            session()->setFlashdata("error", $errorString);
            return redirect()->back();
        }
    }
    public function updatePassword($id){
        $user = new Users();
        $data = [
			'user' => $user->where('id',$id)->first(),
        ];
        return view('user-update-password', $data);
    }
    public function PostUpdatePassword($id){
        helper(['form']);
		$YourModel = model('Users');

		// Get the existing data for the record being updated
		$YourModel->find($id);
        $rules = [
            'password'              => 'required|min_length[6]|max_length[200]',
            'password_confirmation' => 'matches[password]'
        ];
		if($this->validate($rules)){
            $data = [
                'password'     => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            ];
            // Update the record
			$YourModel->update($id, $data);
		
			// Redirect to the dashboard page with a success message
			session()->setFlashdata('success', 'Password Updated Successfully');
			return redirect()->to('/dashboard');
        }else{
            session()->setFlashdata('error', 'Password Not Match/Minimal 6 Length!');
			return redirect()->back();
        }
    }
    public function PostBooking(){
		$booking =  new Booking();

		$idVilla = $this->request->getPost('id_villa');
        $idUser = $this->request->getPost('id_user');
        $startDate = $this->request->getPost('start_date');
        $duration = $this->request->getPost('duration');
        $endDate = $this->request->getPost('end_date');
        $price = $this->request->getPost('price');
        $totalPrice = $price * $duration;
        $status = "Waiting";

        $booking->insert([
            'id_villa' => $idVilla,
            'id_user' => $idUser,
            'start_date' => $startDate,
            'duration' => $duration,
            'end_date' => $endDate,
            'price' => $price,
            'total_price' => $totalPrice,
            'status' => $status
        ]);
		session()->setFlashdata('success', 'Villa Booked Successfully, Please Wait the Confirmation Status');
		return redirect()->to('/checklist');
    }
    public function MyBooking(){
        helper('number');
        $booking = new Booking();
        $data = [
			'booking' => $booking->where('id_user',session('id'))->find(),
        ];
        return view('booking-order', $data);
    }
    public function SearchVilla(){
        helper('number');
        // Get the search query from the user
        $searchQuery = $this->request->getVar('query');

        // Perform the search using your model
        $data['results'] = $this->Villas->search($searchQuery);

        // Pass the results to your view
        return view('search_results', $data);
    }
    public function SearchVillaProperties(){
        helper('number');
        // Get the search query from the user
        $searchQuery = $this->request->getVar('query');

        // Perform the search using your model
        $data = [
            'results'=> $this->Villas->search($searchQuery),
        ];

        // Pass the results to your view
        return view('search_results_properties', $data);
    }
}
