<x-app-layout>
<div class="container">
    <h1>{{ isset($employee) ? 'Edit' : 'Add' }} Employee</h1>
    <form action="{{ isset($employee) ? route('employees.update', $employee) : route('employees.store') }}" method="POST">
        @csrf
        @if (isset($employee))
            @method('PUT')
        @endif
        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" name="first_name" class="form-control" value="{{ old('first_name', $employee->first_name ?? '') }}" required>
        </div>
        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" class="form-control" value="{{ old('last_name', $employee->last_name ?? '') }}" required>
        </div>
        <div class="form-group">
            <label for="company_id">Company</label>
            <select name="company_id" class="form-control" required>
                @foreach ($companies as $company)
                    <option value="{{ $company->id }}" {{ (isset($employee) && $employee->company_id == $company->id) ? 'selected' : '' }}>
                        {{ $company->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $employee->email ?? '') }}">
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" name="phone" class="form-control" value="{{ old('phone', $employee->phone ?? '') }}">
        </div>
        <button type="submit" class="btn btn-primary">{{ isset($employee) ? 'Update' : 'Add' }} Employee</button>
    </form>
</div>
</x-app-layout>
