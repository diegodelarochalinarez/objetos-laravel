<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>MVC Persistencia de objetos con laravel</title>
  @vite('resources/css/app.css')
  </head>
  <body class="flex items-center justify-center min-h-screen bg-gray-100 text-1.5xl">
    <div class="bg-white shadow-lg rounded-xl p-6 w-80">
      <form method="POST">
        @csrf
        <div class="mb-4 flex flex-row items-center">
          <label for="numero" class="block text-gray-700 font-medium mb-1 mr-8">Número</label>
          <input type="number" id="numero" name="n" value="{{ old('n', $operacion->setN()) }}" required
                class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
        </div>

        <div class="mb-4 flex flex-row items-center">
          <label class="block mr-2 text-gray-700 font-medium">Resultado:</label>
          <div id="resultado" class="w-full">
            <p class="font-semibold text-center">{{$operacion->getResultado()}}</p>
          </div>
        </div>

        <div class="grid grid-cols-2 gap-3">
          <button type="submit" formaction="{{ url('/factorial') }}" class="bg-cyan-700 text-white py-2 rounded-lg shadow hover:bg-cyan-800 transition">Factorial</button>
          <button type="submit" formaction="{{ url('/fibonacci') }}" class="bg-cyan-700 text-white py-2 rounded-lg shadow hover:bg-cyan-800 transition">Fibonacci</button>
          <button type="submit" formaction="{{ url('/ackerman') }}" class="bg-cyan-700 text-white py-2 rounded-lg shadow hover:bg-cyan-800 transition">Ackerman</button>
          <button type="submit" formaction="{{ url('/') }}" formmethod="get" class="bg-cyan-700 text-white py-2 rounded-lg shadow hover:bg-cyan-800 transition">Limpiar</button>
        </div>
      </form>
    </div>
  </body>
</html>
