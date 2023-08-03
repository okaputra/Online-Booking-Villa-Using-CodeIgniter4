<?php

namespace App\Controllers;
use App\Models\Villas;
use App\Models\Features;
use App\Models\Users;
use App\Models\Booking;
use App\Models\VillaContent;
use Intervention\Image\ImageManagerStatic as Image;
use Intervention\Image\ImageManager;
use Config\Services;

class AdminController extends BaseController
{
    public function Home(){
        helper('number');
		$user = new Users();
		$villa = new Villas();
		$user = [
			'userCount' =>$user->where('akses',0)->countAllResults(),
			'villaCount' =>$villa->countAllResults(),
		];
        return view('admin/dashboard', $user);
    }

	public function List(){
		helper('number');
		$user = new Users();
		$villa = new Villas();
		$data = [
			'userCount' =>$user->where('akses',0)->countAllResults(),
			'villaCount' =>$villa->countAllResults(),
			'villa' => $villa->findAll()
		];
        return view('admin/list-view', $data);
	}

	public function Details($id){
		helper('number');
		$user = new Users();
        $features = new Features();
		$villa = new Villas();
		$villaContent = new VillaContent();
        $data = [
			'features' => $features->where('id_villa',$id)->find(),
			'villaContent' => $villaContent->where('id_villa',$id)->first(),
			'villa' => $villa->where('id',$id)->first(),
			'userCount' =>$user->where('akses',0)->countAllResults(),
			'villaCount' =>$villa->countAllResults(),
		];
        return view('admin/admin-detail-villa',$data);
	}

    // CRUD
    public function Create(){
        return view('admin/create');
    }
    public function PostVilla(){
        if (!$this->validate([
			'villa_name' => [
				'rules' => 'required',
			],
			'description' => [
				'rules' => 'required',
			],
			'rooms' => [
				'rules' => 'required',
			],
			'beds' => [
				'rules' => 'required',
			],
			'baths' => [
				'rules' => 'required',
			],
			'square_feet' => [
				'rules' => 'required',
			],
			'price' => [
				'rules' => 'required',
			],
			'thumbnail' => [
				'rules' => 'mime_in[thumbnail,image/jpg,image/jpeg,image/gif,image/png]|max_size[thumbnail,2048]',
			]
		])) {
			session()->setFlashdata('error', 'Max size 2 MB, and Thumbnail must be in type jpg, jpeg, gif, png!');
			return redirect()->back()->withInput();
		}
		$villa =  new Villas();;
		$data = $this->request->getFile('thumbnail');
		$fileName = $data->getRandomName();
		$villa->insert([
			'villa_name' => $this->request->getPost('villa_name'),
			'description' => $this->request->getPost('description'),
			'rooms' => $this->request->getPost('rooms'),
			'beds' => $this->request->getPost('beds'),
			'baths' => $this->request->getPost('baths'),
			'square_feet' => $this->request->getPost('square_feet'),
			'price' => $this->request->getPost('price'),
			'thumbnail' => $fileName,
		]);
		$data->move('uploads/data_thumbnail/', $fileName);
		session()->setFlashdata('success', 'Villa Inserted Successfully');
		return redirect()->to('/admin-list-villa');
    }
	public function UpdateVilla($id){
		$model = new Villas();
        $data['villa'] = $model->find($id);
		return view('admin/edit-villa', $data);
	}
	public function PostUpdateVilla($id){
		$YourModel = model('Villas');

		// Get the existing data for the record being updated
		$existingData = $YourModel->find($id);

		// Get the form data
		$data = [
			'villa_name' => $this->request->getPost('villa_name'),
			'description' => $this->request->getPost('description'),
			'rooms' => $this->request->getPost('rooms'),
			'beds' => $this->request->getPost('beds'),
			'baths' => $this->request->getPost('baths'),
			'square_feet' => $this->request->getPost('square_feet'),
			'price' => $this->request->getPost('price'),
			'thumbnail' => $existingData['thumbnail']
		];

		// Check if a new image was uploaded for thumbnail
		$thumbnail = $this->request->getFile('thumbnail');
		if ($thumbnail->isValid() && !$thumbnail->hasMoved())
		{
			// Generate a new file name
			$fileName1 = $thumbnail->getRandomName();

			// Resize the image and move the new file to the uploads directory
			$manager = new ImageManager(['driver' => 'gd']);
			$image = $manager->make($thumbnail->getRealPath());
			$image->save('uploads/data_thumbnail/'.$fileName1);

			// Update the thumbnail file name in the database
			$data['thumbnail'] = $fileName1;

			// Delete the existing thumbnail file
			unlink('uploads/data_thumbnail/'.$existingData['thumbnail']);
		}

		// Update the record
		$YourModel->update($id, $data);
	
		// Redirect to the list activity page with a success message
		session()->setFlashdata('success', 'Villa Updated Successfully');
		return redirect()->to('/admin-list-villa');
	}
	public function DeleteVilla($id){
		$villa = new Villas();
        $villa->where('id', $id)->delete();
		$villaContent = new VillaContent();
        $villaContent->where('id_villa', $id)->delete();
		$features = new Features();
        $features->where('id_villa', $id)->delete();
		$model = new Booking();
        $model->where('id_villa', $id)->delete();
        session()->setFlashdata('success', 'Villa Deleted Successfully');
		return redirect()->to('/admin-list-villa');
	}
	public function Features(){
		helper('number');
		$user = new Users();
		$villa = new Villas();
		$data = [
			'userCount' =>$user->where('akses',0)->countAllResults(),
			'villaCount' =>$villa->countAllResults(),
			'villa' => $villa->findAll()
		];
        return view('admin/table-villa', $data);
	}
	public function CreateFeatures($id){
		$features = new Features();
		$villa = new Villas();
		$data = [
			'id' => $id,
			'features' => $features->where('id_villa',$id)->find(),
			'villa' => $villa->where('id',$id)->first(),
		];
		return view('admin/create-features',$data);
	}
	public function PostFeatures($id){
		if (!$this->validate([
			'features_name' => [
				'rules' => 'required',
			],
		])) {
			return redirect()->back()->withInput();
		}
		$features =  new Features();
		$features->insert([
			'id_villa' => $id,
			'features_name' => $this->request->getPost('features_name'),
		]);
		session()->setFlashdata('success', 'Feature Inserted Successfully');
		return redirect()->back();
	}
	public function DeleteFeatures($id){
		$model = new Features();
        $model->where('id', $id)->delete();
        session()->setFlashdata('success', 'Feature Deleted Successfully');
		return redirect()->back();
	}
	public function EditFeatures($id){
		$model = new Features();
        $data['feature'] = $model->find($id);
		return view('admin/edit-feature', $data);
	}
	public function PostUpdateFeatures($id){
		$YourModel = model('Features');

		// Get the existing data for the record being updated
		$existingData = $YourModel->find($id);
		$id_villa = $this->request->getPost('id_villa');

		// Get the form data
		$data = [
			'features_name' => $this->request->getPost('features_name'),
		];

		// Update the record
		$YourModel->update($id, $data);
	
		// Redirect to the list activity page with a success message
		session()->setFlashdata('success', 'Feature Updated Successfully');
		return redirect()->to('/admin-insert-new-features/'. $id_villa);
	}
	public function Content(){
		helper('number');
		$user = new Users();
		$villa = new Villas();
		$data = [
			'userCount' =>$user->where('akses',0)->countAllResults(),
			'villaCount' =>$villa->countAllResults(),
			'villa' => $villa->findAll()
		];
        return view('admin/table_villa_content', $data);
	}
	public function CreateContent($id){
		$villaContent = new VillaContent();
		$villa = new Villas();
		$data = [
			'id' => $id,
			'VillaContent' => $villaContent->where('id_villa',$id)->find(),
			'villa' => $villa->where('id',$id)->first(),
		];
		return view('admin/create-content',$data);
	}
	public function PostContent($id){
		if (!$this->validate([
			'image_1' => [
				'rules' => 'mime_in[image_1,image/jpg,image/jpeg,image/gif,image/png]|max_size[image_1,2048]',
			],
			'image_2' => [
				'rules' => 'mime_in[image_2,image/jpg,image/jpeg,image/gif,image/png]|max_size[image_2,2048]',
			],
			'image_3' => [
				'rules' => 'mime_in[image_3,image/jpg,image/jpeg,image/gif,image/png]|max_size[image_3,2048]',
			],
			'image_4' => [
				'rules' => 'mime_in[image_4,image/jpg,image/jpeg,image/gif,image/png]|max_size[image_4,2048]',
			],
			'image_5' => [
				'rules' => 'mime_in[image_5,image/jpg,image/jpeg,image/gif,image/png]|max_size[image_5,2048]',
			],
		])) {
			session()->setFlashdata('error', 'Max size 2 MB, and Images must be in type jpg, jpeg, gif, png!');
			return redirect()->back()->withInput();
		}
		$content =  new VillaContent();
		$image_1 = $this->request->getFile('image_1');
		$image_2 = $this->request->getFile('image_2');
		$image_3 = $this->request->getFile('image_3');
		$image_4 = $this->request->getFile('image_4');
		$image_5 = $this->request->getFile('image_5');
		$fileName1 = $image_1->getRandomName();
		$fileName2 = $image_2->getRandomName();
		$fileName3 = $image_3->getRandomName();
		$fileName4 = $image_4->getRandomName();
		$fileName5 = $image_5->getRandomName();
		$content->insert([
			'id_villa' => $id,
			'image_1' => $fileName1,
			'image_2' => $fileName2,
			'image_3' => $fileName3,
			'image_4' => $fileName4,
			'image_5' => $fileName5,
			// 'video' => $this->request->getPost('video'),
			'link_maps' => $this->request->getPost('link_maps'),
		]);
		$image_1->move('uploads/data_content/', $fileName1);
		$image_2->move('uploads/data_content/', $fileName2);
		$image_3->move('uploads/data_content/', $fileName3);
		$image_4->move('uploads/data_content/', $fileName4);
		$image_5->move('uploads/data_content/', $fileName5);
		session()->setFlashdata('success', 'Content Inserted Successfully');
		return redirect()->to('/admin-view-details/'. $id);
	}
	public function DeleteContent($id){
		$model = new VillaContent();
        $model->where('id', $id)->delete();
        session()->setFlashdata('success', 'Content Deleted Successfully');
		return redirect()->back();
	}
	public function EditContent($id){
		$model = new VillaContent();
        $data['villaContent'] = $model->find($id);
		return view('admin/edit-villacontent', $data);
	}
	public function PostUpdateContent($id){
		$YourModel = model('VillaContent');

		// Get the existing data for the record being updated
		$existingData = $YourModel->find($id);
		$id_villa = $this->request->getPost('id_villa');

		// Get the form data
		$data = [
			// 'video' => $this->request->getPost('video'),
			'link_maps' => $this->request->getPost('link_maps'),
			'image_1' => $existingData['image_1'],
			'image_2' => $existingData['image_2'],
			'image_3' => $existingData['image_3'],
			'image_4' => $existingData['image_4'],
			'image_5' => $existingData['image_5']
		];

		// Check if a new image was uploaded for thumbnail
		$image_1 = $this->request->getFile('image_1');
		if ($image_1->isValid() && !$image_1->hasMoved())
		{
			// Generate a new file name
			$fileName1 = $image_1->getRandomName();

			// Resize the image and move the new file to the uploads directory
			$manager = new ImageManager(['driver' => 'gd']);
			$image = $manager->make($image_1->getRealPath());
			$image->save('uploads/data_content/'.$fileName1);

			// Update the thumbnail file name in the database
			$data['image_1'] = $fileName1;

			// Delete the existing image_1 file
			unlink('uploads/data_content/'.$existingData['image_1']);
		}
		// Check if a new image was uploaded for thumbnail
		$image_2 = $this->request->getFile('image_2');
		if ($image_2->isValid() && !$image_2->hasMoved())
		{
			// Generate a new file name
			$fileName1 = $image_2->getRandomName();

			// Resize the image and move the new file to the uploads directory
			$manager = new ImageManager(['driver' => 'gd']);
			$image = $manager->make($image_2->getRealPath());
			$image->save('uploads/data_content/'.$fileName1);

			// Update the thumbnail file name in the database
			$data['image_2'] = $fileName1;

			// Delete the existing image_2 file
			unlink('uploads/data_content/'.$existingData['image_2']);
		}
		// Check if a new image was uploaded for thumbnail
		$image_3 = $this->request->getFile('image_3');
		if ($image_3->isValid() && !$image_3->hasMoved())
		{
			// Generate a new file name
			$fileName1 = $image_3->getRandomName();

			// Resize the image and move the new file to the uploads directory
			$manager = new ImageManager(['driver' => 'gd']);
			$image = $manager->make($image_3->getRealPath());
			$image->save('uploads/data_content/'.$fileName1);

			// Update the thumbnail file name in the database
			$data['image_3'] = $fileName1;

			// Delete the existing image_3 file
			unlink('uploads/data_content/'.$existingData['image_3']);
		}
		// Check if a new image was uploaded for thumbnail
		$image_4 = $this->request->getFile('image_4');
		if ($image_4->isValid() && !$image_4->hasMoved())
		{
			// Generate a new file name
			$fileName1 = $image_4->getRandomName();

			// Resize the image and move the new file to the uploads directory
			$manager = new ImageManager(['driver' => 'gd']);
			$image = $manager->make($image_4->getRealPath());
			$image->save('uploads/data_content/'.$fileName1);

			// Update the thumbnail file name in the database
			$data['image_4'] = $fileName1;

			// Delete the existing image_4 file
			unlink('uploads/data_content/'.$existingData['image_4']);
		}
		// Check if a new image was uploaded for thumbnail
		$image_5 = $this->request->getFile('image_5');
		if ($image_5->isValid() && !$image_5->hasMoved())
		{
			// Generate a new file name
			$fileName1 = $image_5->getRandomName();

			// Resize the image and move the new file to the uploads directory
			$manager = new ImageManager(['driver' => 'gd']);
			$image = $manager->make($image_5->getRealPath());
			$image->save('uploads/data_content/'.$fileName1);

			// Update the thumbnail file name in the database
			$data['image_5'] = $fileName1;

			// Delete the existing image_5 file
			unlink('uploads/data_content/'.$existingData['image_5']);
		}

		// Update the record
		$YourModel->update($id, $data);
	
		// Redirect to the list activity page with a success message
		session()->setFlashdata('success', 'Content Updated Successfully');
		return redirect()->to('/admin-view-details/'. $id_villa);
	}
	public function UpdateProfile($id){
		$user = new Users();
        $data = [
			'user' => $user->where('id',$id)->first(),
        ];
		return view('admin/update-profile', $data);
	}
	public function PostUpdateProfile($id){
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
			return redirect()->to('/admin-dashboard');
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
	public function UpdatePassword($id){
		$user = new Users();
        $data = [
			'user' => $user->where('id',$id)->first(),
        ];
		return view('admin/update-password', $data);
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
			return redirect()->to('/admin-dashboard');
        }else{
            session()->setFlashdata('error', 'Password Not Match/Minimal 6 Length!');
			return redirect()->back();
        }
	}
	public function ListBookedVilla(){
		helper('number');
		$user = new Users();
		$villa = new Villas();
		$booking = new Booking();
		$user = [
			'userCount' 	=>$user->where('akses',0)->countAllResults(),
			'villaCount' 	=>$villa->countAllResults(),
			'booking' 		=>$booking->findAll(),
		];
        return view('admin/booked-list', $user);
	}
	public function DetailBookedVilla($id){
		helper('number');
		$user = new Users();
		$villa = new Villas();
		$booking = new Booking();
		$user = [
			'userCount' 	=>$user->where('akses',0)->countAllResults(),
			'villaCount' 	=>$villa->countAllResults(),
			'booking' 		=>$booking->where('id',$id)->first(),
		];
        return view('admin/detail-booking-villa', $user);
	}
	public function ConfirmBooking($id){
		$YourModel = model('Booking');

		// Get the existing data for the record being updated
		$YourModel->find($id);

		// Get the form data
		$data = [
			'status' => 'Paid',
		];

		// Update the record
		$YourModel->update($id, $data);

		session()->setFlashdata('success', 'Book Confirmed');
		return redirect()->back();
	}
	public function RejectBooking($id){
		$YourModel = model('Booking');

		// Get the existing data for the record being updated
		$YourModel->find($id);

		// Get the form data
		$data = [
			'status' => 'Rejected',
		];

		// Update the record
		$YourModel->update($id, $data);

		session()->setFlashdata('success', 'Book Rejected');
		return redirect()->back();
	}
	public function ChangeStatus($id){
		$YourModel = model('Booking');

		// Get the existing data for the record being updated
		$YourModel->find($id);

		// Get the form data
		$data = [
			'status' => $this->request->getPost('status'),
		];

		// Update the record
		$YourModel->update($id, $data);

		session()->setFlashdata('success', 'Book Status Changed');
		return redirect()->back();
	}
	public function DeleteBookedVilla($id){
		$model = new Booking();
        $model->where('id', $id)->delete();
        session()->setFlashdata('success', 'Deleted Successfully');
		return redirect()->back();
	}
}
