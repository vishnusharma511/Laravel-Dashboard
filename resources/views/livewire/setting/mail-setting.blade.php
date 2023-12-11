<div>
    @if ($editMode)
        <div class="container-fluid py-4">
            <div class="card">
                <div class="card-header pb-0 px-3">
                    <h6 class="mb-0">{{ __('SMTP Credentials') }}</h6>
                </div>
                <div class="card-body pt-4 p-3">

                    <div wire:model="showSuccessNotification" class="mt-3 alert alert-primary alert-dismissible fade show"
                        role="alert">
                        <span class="alert-icon text-white"><i class="ni ni-like-2"></i></span>
                        <span
                            class="alert-text text-white">{{ __('SMTP credentials have been successfully saved!') }}</span>
                        <button wire:click="$set('showSuccessNotification', false)" type="button" class="btn-close"
                            data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                    <form wire:submit.prevent="create" role="form text-left">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mail-mailer" class="form-control-label">{{ __('Mail Mailer') }}</label>
                                    <div class="@error('mail_mailer') border border-danger rounded-3 @enderror">
                                        <input wire:model="mail_mailer" class="form-control" type="text"
                                            placeholder="Mail Mailer" id="mail-mailer">
                                    </div>
                                    @error('mail_mailer')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mail-host" class="form-control-label">{{ __('Mail Host') }}</label>
                                    <div class="@error('mail_host') border border-danger rounded-3 @enderror">
                                        <input wire:model="mail_host" class="form-control" type="text"
                                            placeholder="Mail Host" id="mail-host">
                                    </div>
                                    @error('mail_host')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mail-port" class="form-control-label">{{ __('Mail Port') }}</label>
                                    <div class="@error('mail_port') border border-danger rounded-3 @enderror">
                                        <input wire:model="mail_port" class="form-control" type="number"
                                            placeholder="Mail Port" id="mail-port">
                                    </div>
                                    @error('mail_port')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mail-username"
                                        class="form-control-label">{{ __('Mail Username') }}</label>
                                    <div class="@error('mail_username') border border-danger rounded-3 @enderror">
                                        <input wire:model="mail_username" class="form-control" type="text"
                                            placeholder="Mail Username" id="mail-username">
                                    </div>
                                    @error('mail_username')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mail-password"
                                        class="form-control-label">{{ __('Mail Password') }}</label>
                                    <div class="@error('mail_password') border border-danger rounded-3 @enderror">
                                        <input wire:model="mail_password" class="form-control" type="text"
                                            placeholder="Mail Password" id="mail-password">
                                    </div>
                                    @error('mail_password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mail-encryption"
                                        class="form-control-label">{{ __('Mail Encryption') }}</label>
                                    <div class="@error('mail_encryption') border border-danger rounded-3 @enderror">
                                        <input wire:model="mail_encryption" class="form-control" type="text"
                                            placeholder="Mail Encryption" id="mail-encryption">
                                    </div>
                                    @error('mail_encryption')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mail-from" class="form-control-label">{{ __('Mail From') }}</label>
                                    <div class="@error('mail_from') border border-danger rounded-3 @enderror">
                                        <input wire:model="mail_from" class="form-control" type="text"
                                            placeholder="Mail From" id="mail-from">
                                    </div>
                                    @error('mail_from')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit"
                                class="btn bg-gradient-dark btn-md mt-4 mb-4">{{ __('Create') }}</button>
                            <button wire:click="update"
                                class="btn bg-gradient-dark btn-md mt-4 mb-4">{{ __('Save Changes') }}</button>
                            <button wire:click="cancelEdit"
                                class="btn bg-gradient-dark btn-md mt-4 mb-4">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @else
        <!-- View Mode -->
        <div class="main-content">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4 mx-4">
                        <div class="card-header pb-0">
                            <div class="d-flex flex-row justify-content-between">
                                <div>
                                    <h5 class="mb-0">SMTP's</h5>
                                </div>
                                <a wire:click="createNew" class="btn bg-gradient-primary btn-sm mb-0"
                                    type="button">+&nbsp;
                                    New</a>
                            </div>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                ID
                                            </th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Mailer</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Host</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Port</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Username</th>

                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Encryption</th>

                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($mailSettings as $setting)
                                            <tr>
                                                <td class="ps-4">
                                                    <p class="text-xs font-weight-bold mb-0">1</p>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">{{ $setting->mail_mailer }}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">{{ $setting->mail_host }}
                                                    </p>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span
                                                        class="badge badge-sm bg-gradient-success">{{ $setting->mail_port }}</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span
                                                        class="text-secondary text-xs font-weight-bold">{{ $setting->mail_username }}</span>
                                                </td>

                                                <td class="align-middle text-center">
                                                    <span
                                                        class="text-secondary text-xs font-weight-bold">{{ $setting->mail_encryption }}</span>
                                                </td>


                                                <td class="text-center">
                                                    <a wire:click="edit({{ $setting->id }})" type="button"
                                                        class="text-secondary font-weight-bold text-xs"
                                                        data-toggle="tooltip" data-original-title="Edit"><i
                                                            class="fas fa-edit"></i></a>
                                                    <a wire:click="delete({{ $setting->id }})" type="button"
                                                        class="text-secondary font-weight-bold text-xs"
                                                        data-toggle="tooltip" data-original-title="Delete">
                                                        <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    @endif
</div>
