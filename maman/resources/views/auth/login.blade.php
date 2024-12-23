

<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <div>
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Connexion
            </h2>
        </div>
        <form class="mt-8 space-y-6" method="POST" action="{{ route('login.post') }}">
            @csrf
            <div>
                <label for="password" class="sr-only">Mot de passe</label>
                <input 
                    id="password" 
                    name="password" 
                    type="password" 
                    required 
                    class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                    placeholder="Mot de passe">
            </div>
            @if ($errors->has('password'))
                <div class="text-red-500 text-sm text-center">{{ $errors->first('password') }}</div>
            @endif
            <div>
                <button 
                    type="submit" 
                    class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Se connecter
                </button>
            </div>
        </form>
    </div>
</div>
