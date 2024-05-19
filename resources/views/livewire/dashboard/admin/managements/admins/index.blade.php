<div>

    <x-dashboard.admin.layout.includes.toolbar :breadcrumb='$breadcrumb'/>

    <div class="card card-flush shadow-sm">

        <div class="card-header">
            <h3 class="card-title">Admins</h3>
            <div class="card-toolbar">
                {{--btn add--}}
                <x-dashboard.admin.btn.add :route="route('dashboard.admin.management.admins.create')"/>

            </div>
        </div>

        <div class="card-body py-5">

            {{--search--}}
            <x-dashboard.admin.input.search/>

            <div class="table-responsive">

                <table class="table table-striped table-sm gy-7 gs-7 border">
                    <thead>
                        <tr class="fw-semibold fs-6 text-gray-800 border-bottom border-gray-200">
                            <th>#</th>
                            <th>name</th>
                            <th>email</th>
                            <th>phone</th>
                            <th>roles</th>
                            <th>image</th>
                            <th>status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($admins as $admin)

                            <tr>
                                <td>{{ $loop->index }}</td>
                                <td>{{ $admin->name }}</td>
                                <td>{{ $admin->email }}</td>
                                <td>{{ $admin->phone }}</td>
                                <td>roles</td>
                                <td>
                                    <img src="{{ $admin->image_path }}" width="70">
                                </td>
                                <td>
                                    {{--btn status--}}
                                    <x-dashboard.admin.input.status :id="$admin->id" :value='$admin->status'/>
                                </td>
                                <td>
                                    {{--btn delete--}}
                                    <x-dashboard.admin.btn.delete :id='$admin->id'/>

                                    {{--btn edit--}}
                                    <x-dashboard.admin.btn.edit :route="route('dashboard.admin.management.admins.edit', $admin->id)"/>

                                </td>
                            </tr>

                        @endforeach


                    </tbody>
                </table>
                
            </div>{{-- responsive --}}

            <div class="card-header">
                <h3 class="card-title">Admins</h3>
                <div class="card-toolbar">
                    {{ $admins->links() }}
                </div>
            </div>

        </div>{{-- card-body --}}


    </div>{{-- card --}}

</div>