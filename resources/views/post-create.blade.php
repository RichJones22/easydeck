<x-guest-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">


{{--        <form method="POST" action="/PostCreate">--}}
{{--            @csrf--}}

{{--            <label>enter post: </label>--}}
{{--            <input class="outline-black" type="text" id="lpost" name="lpost">--}}
{{--            <button> Press Me</button>--}}

{{--        </form>--}}

        <div class="flex mt-4 mb-4">
            <form method="POST" action="/PostCreate">
                @csrf
                <label class="text-xl text-gray-700 text-sm font-bold mb-2" for="post">
                    enter post:
                </label>
                <input class="ml-2 shadow appearance-none border rounded py-2 px-3
                      text-gray-700 leading-tight focus:outline-none
                      focus:shadow-outline"
                       id="lpost" name="post" type="text" placeholder="post here...">

                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Press Me
                </button>

            </form>

        </div>


        </div>
    </div>
</x-guest-layout>
