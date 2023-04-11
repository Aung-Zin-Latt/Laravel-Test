<?php

namespace App\Http\Livewire\User;

use Illuminate\Support\Facades\Log;
use Exception;
use Livewire\Component;
use App\Mail\ContactFormMail;
use App\Models\UserFormSetting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\UserSubmitFromRequest;

class AddUserContactForm extends Component
{
    public $inputs = [];
    public $name;
    public $phone_number;
    public $date_of_birth;
    public $gender;

    public function mount()
    {
        $this->inputs = UserFormSetting::formInputs();
    }

    // Update method for Error
    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required|string',
            'phone_number' => 'required|string',
            'date_of_birth' => 'required|date',
            'gender' => 'required|string',
        ]);
    }

    public function submit()
    {

        // Validate form data
        $this->validate([
            'name' => 'required|string',
            'phone_number' => 'required|string',
            'date_of_birth' => 'required|date',
            'gender' => 'required|string',
        ]);

        try {
            // Get the authenticated user's email
            $recipientEmail = Auth::user()->email;

            $data = new UserFormSetting();
            $data->name = $this->name;
            $data->phone_number = $this->phone_number;
            $data->date_of_birth = $this->date_of_birth;
            $data->gender = $this->gender;
            $data->save();

            // Send email to the authenticated user's email
            Mail::to($recipientEmail)->send(new ContactFormMail($data->toArray()));

            session()->flash('message', 'Form submitted successfully!');
            $this->reset();

            // Redirect to contact_form.blade.php as ("Optional")
            return redirect('/user/servey/add');

        } catch (Exception $e) {
            session()->flash('error', 'Form submission failed. Please try again later.');
            // You can also log the error for debugging purposes
            Log::error('Form submission failed: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.user.add-user-contact-form');
    }
}
