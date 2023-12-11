<x-edit-modal :width="null">
    <x-slot name="slot">
        <p class="text-sm"><span class="text-red-500 sups">*</span> Campo Obrigatório</p>
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <input type="hidden" name="id" value="{{$patient->id}}"/>
            <div class="sm:col-span-full">
                <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name<span class="text-red-500 sups">*</span></label>
                <div class="mt-2">
                    <input type="text" name="name" value="{{$patient->name}}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required/>
                </div>
                @error('name')
                <div class="error text-sm text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="sm:col-span-full">
                <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Date of Birth<span class="text-red-500 sups">*</span></label>
                <div class="mt-2">
                    <input type="date" name="dob" value="{{$patient->dob}}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required/>
                </div>
                @error('dob')
                <div class="error text-sm text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="sm:col-span-full">
                <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Email<span class="text-red-500 sups">*</span></label>
                <div class="mt-2">
                    <input type="email" name="email" value="{{$patient->email}}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required/>
                </div>
                @error('email')
                <div class="error text-sm text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="sm:col-span-full">
                <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Phone Number<span class="text-red-500 sups">*</span></label>
                <div class="mt-2">
                    <input type="text" name="phone_number" value="{{$patient->phone_number}}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required/>
                </div>
                @error('phone_number')
                <div class="error text-sm text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="sm:col-span-full">
                <label for="name" class="block text-sm font-medium leading-6 text-gray-900">General Practitioner Name<span class="text-red-500 sups">*</span></label>
                <div class="mt-2">
                    <input type="text" name="gp_name" value="{{$patient->gp_name}}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required/>
                </div>
                @error('gp_name')
                <div class="error text-sm text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="sm:col-span-full">
                <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Patient Allergies</label>
                <div class="mt-2">
                    <label>
                        <textarea name="allergies" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{$patient->allergies}}</textarea>
                    </label>
                </div>
                @error('allergies')
                <div class="error text-sm text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="sm:col-span-full">
                <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Patient Medications</label>
                <div class="mt-2">
                    <label>
                        <textarea name="medications" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{$patient->medications}}</textarea>
                    </label>
                </div>
                @error('medications')
                <div class="error text-sm text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="sm:col-span-full">
                <label for="address_line1" class="block text-sm font-medium leading-6 text-gray-900">Address Line 1<span class="text-red-500 sups">*</span></label>
                <div class="mt-2">
                    <input type="text" name="address_line1" value="{{$patient->address_line1}}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required/>
                </div>
                @error('address_line1')
                <div class="error text-sm text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="sm:col-span-full">
                <label for="address_line2" class="block text-sm font-medium leading-6 text-gray-900">Address Line 2<span class="text-red-500 sups">*</span></label>
                <div class="mt-2">
                    <input type="text" name="address_line2" value="{{$patient->address_line2}}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required/>
                </div>
                @error('address_line2')
                <div class="error text-sm text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </x-slot>
</x-edit-modal>