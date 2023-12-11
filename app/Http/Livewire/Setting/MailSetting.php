<?php

namespace App\Http\Livewire\Setting;

use App\Models\Setting\MailSetting as SettingMailSetting;
use Livewire\Component;

class MailSetting extends Component
{
    public $mailSettings, $mail_mailer, $mail_host, $mail_port, $mail_username, $mail_password, $mail_encryption, $mail_from, $mailSettingId, $editMode;

    protected $rules = [
        'mail_mailer' => 'required|string',
        'mail_host' => 'required|string',
        'mail_port' => 'required|integer',
        'mail_username' => 'nullable|string',
        'mail_password' => 'nullable|string',
        'mail_encryption' => 'nullable|string',
        'mail_from' => 'required|string',
    ];

    public function render()
    {
        $this->mailSettings = SettingMailSetting::all();
        return view('livewire.setting.mail-setting');
    }

    public function createNew()
    {
        $this->resetInputFields();
        $this->editMode = true;
    }


    public function create()
    {
        $this->validate();
        SettingMailSetting::create([
            'mail_mailer' => $this->mail_mailer,
            'mail_host' => $this->mail_host,
            'mail_port' => $this->mail_port,
            'mail_username' => $this->mail_username,
            'mail_password' => $this->mail_password,
            'mail_encryption' => $this->mail_encryption,
            'mail_from' => $this->mail_from,
        ]);
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $mailSetting = SettingMailSetting::findOrFail($id);
        $this->mailSettingId = $id;
        $this->mail_mailer = $mailSetting->mail_mailer;
        $this->mail_host = $mailSetting->mail_host;
        $this->mail_port = $mailSetting->mail_port;
        $this->mail_username = $mailSetting->mail_username;
        $this->mail_password = $mailSetting->mail_password;
        $this->mail_encryption = $mailSetting->mail_encryption;
        $this->mail_from = $mailSetting->mail_from;
        $this->editMode = true;
    }

    public function update()
    {
        $this->validate();

        $mailSetting = SettingMailSetting::findOrFail($this->mailSettingId);
        $mailSetting->update([
            'mail_mailer' => $this->mail_mailer,
            'mail_host' => $this->mail_host,
            'mail_port' => $this->mail_port,
            'mail_username' => $this->mail_username,
            'mail_password' => $this->mail_password,
            'mail_encryption' => $this->mail_encryption,
            'mail_from' => $this->mail_from,
        ]);
        $this->resetInputFields();
    }

    public function delete($id)
    {
        $record = SettingMailSetting::find($id);
        if ($record) {
            $record->delete();
            $this->render();
        }
    }

    public function cancelEdit()
    {
        $this->resetInputFields();
    }

    private function resetInputFields()
    {
        $this->mail_mailer = '';
        $this->mail_host = '';
        $this->mail_port = '';
        $this->mail_username = '';
        $this->mail_password = '';
        $this->mail_encryption = '';
        $this->mail_from = '';
        $this->editMode = false;
    }
}
