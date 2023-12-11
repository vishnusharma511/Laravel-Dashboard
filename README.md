# [Dashboard Laravel Livewire Multi-Role Based Accessbility](https://soft-ui-dashboard-laravel-livewire.creative-tim.com/login)

![version](https://img.shields.io/badge/version-1.0.0-blue.svg) 
![license](https://img.shields.io/badge/license-MIT-blue.svg)   

## Installation

1. Unzip the downloaded archive
2. Copy and paste **soft-ui-dashboard-laravel-master** folder in your **projects** folder. Rename the folder to your project's name
3. In your terminal run `composer install`
4. Copy `.env.example` to `.env` and updated the configurations (mainly the database configuration)
5. In your terminal run `php artisan key:generate`
6. Run `php artisan migrate --seed` to create the database tables and seed the roles and users tables
7. Run `php artisan storage:link` to create the storage symlink (if you are using **Vagrant** with **Homestead** for development, remember to ssh into your virtual machine and run the command from there).


## Documentation
The documentation for the Soft UI Dashboard Laravel Livewire is hosted at our [website](https://soft-ui-dashboard-laravel-livewire.creative-tim.com/documentation/bootstrap/overview/soft-ui-dashboard/index.html).

### Login
If you are not logged in you can only access this page or the Sign Up page. The default url takes you to the login page where you use the default credentials **admin@softui.com** with the password **secret**. Logging in is possible only with already existing credentials. For this to work you should have run the migrations. 

The `App\Http\Livewire\Auth\Login` handles the logging in of an existing user.

```
    public function login() {
        $credentials = $this->validate();
        if(auth()->attempt(['email' => $this->email, 'password' => $this->password], $this->remember_me)) {
            $user = User::where(["email" => $this->email])->first();
            auth()->login($user, $this->remember_me);
            return redirect()->intended('/dashboard-default');        
        }
        else{
            return $this->addError('email', trans('auth.failed')); 
        }
    }
```

### Register
You can register as a user by filling in the name, email and password for your account. You can do this by accessing the sign up page from the "**Sign Up**" button in the top navbar or by clicking the "**Sign Up**" button from the bottom of the log in form.. Another simple way is adding **/sign-up** in the url.

The `App\Http\Livewire\Auth\SignUp` handles the registration of a new user.

```
    public function register() {
        $this->validate();
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password)
        ]);
        auth()->login($user);
        return redirect('/dashboard');
    }
```

### Forgot Password
If a user forgets the account's password it is possible to reset the password. For this the user should click on the "**here**" under the login form or add **/forgot-password** in the url.

The `App\Http\Livewire\Auth\ForgotPassword` takes care of sending an email to the user where he can reset the password afterwards.

```
    public function recoverPassword() { 
        $this->validate();
        $user = User::where('email', $this->email)->first();
        if($user){
            $this->notify(new ResetPassword($user->id));
            $this->showSuccesNotification = true;
            $this->showFailureNotification = false;
        } else {
            $this->showFailureNotification = true;
        }
    }
```

### Reset Password
The user who forgot the password gets an email on the account's email address. The user can access the reset password page by clicking the button found in the email. The link for resetting the password is available for 12 hours. The user must add the email, the password and confirm the password for his password to be updated.

The `App\Http\Livewire\Auth\ResetPassword` helps the user reset the password.

```
    public function resetPassword() {
        $this->validate();
        $existingUser = User::where('email', $this->email)->first();
        if($existingUser && $existingUser->id == $this->urlID) { 
            $existingUser->update([
                'password' => Hash::make($this->password) 
            ]);
            $this->showSuccesNotification = true;
            $this->showFailureNotification = false;
        } else {
            $this->showFailureNotification = true;
        }
    }
```

### User Profile
The profile can be accessed by a logged in user by clicking "**User Profile**" from the sidebar or adding **/user-profile** in the url. The user can add information like phone number, location, description or change the name and email.

The `App\Http\Livewire\UserProfile` handles the user's profile information.

```
    public function save() {
        $this->validate();
        $this->user->save();
        $this->showSuccesNotification = true;
    }
```

### Dashboard
You can access the dashboard either by using the "**Dashboard**" link in the left sidebar or by adding **/dashboard** in the url after logging in.
