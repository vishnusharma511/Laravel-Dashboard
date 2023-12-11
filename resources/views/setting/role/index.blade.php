<x-layouts.app>

<div class="main-content">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">Role's</h5>
                        </div>
                        @can('Role create')
                            <a href="{{route('admin.roles.create')}}" class="btn bg-gradient-primary btn-sm mb-0" >+&nbsp; New</a>
                        @endcan
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
                                        Name</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Permissions</th>

                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @can('Role access')
                                @foreach ($roles as $key => $role)
                                    <tr>
                                        <td class="ps-4">
                                            <p class="text-xs font-weight-bold mb-0">{{ $key }}</p>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $role->name }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <div class="d-flex flex-wrap">
                                            @foreach($role->permissions as $permission)
                                                <span class="badge badge-sm bg-gradient-success mb-2 me-2">{{ $permission->name }}</span>
                                            @endforeach
                                        </div>
                                        </td>

                                        <td class="text-center">
                                            @can('Role edit')
                                            <a href="{{route('admin.roles.edit',$role->id)}}" type="button"
                                                class="text-secondary font-weight-bold text-xs"
                                                data-toggle="tooltip" data-original-title="Edit"><i
                                                    class="fas fa-edit"></i></a>
                                            @endcan

                                            @can('Role delete')
                                            <form action="{{ route('admin.roles.destroy', $role->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('delete')
                                                <button class="text-secondary font-weight-bold text-xs">
                                                    <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                                </button>
                                            </form>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                                @endcan
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-layouts.app>
