<x-add-modal :width="null">
    <x-slot name="slot">
        <p class="text-sm"><span class="text-red-500 sups">*</span> Required Field</p>
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="sm:col-span-full">
                <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Patient<span class="text-red-500 sups">*</span></label>
                <select class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" name="patient_id">
                    <option selected></option>
                    @foreach($patients as $patient)
                        <option value="{{$patient->id}}">{{$patient->name}} - {{$patient->hospital->name}}</option>
                    @endforeach
                </select>
                @error('patient_id')
                    <div class="error text-sm text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="sm:col-span-full">
                <label for="address_line1" class="block text-sm font-medium leading-6 text-gray-900">Description of Service<span class="text-red-500 sups">*</span></label>
                <div class="mt-2">
                    <input type="text" name="description" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required/>
                </div>
                @error('description')
                <div class="error text-sm text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="sm:col-span-full">
                <label for="address_line2" class="block text-sm font-medium leading-6 text-gray-900">Service Charge (VAT not included)<span class="text-red-500 sups">*</span></label>
                <div class="mt-2">
                    <input type="text" name="total_amount" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required/>
                </div>
                @error('total_amount')
                <div class="error text-sm text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>

        </div>
    </x-slot>
</x-add-modal>