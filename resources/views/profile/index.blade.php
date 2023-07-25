<x-layout>
    <x-setting heading="View and edit your profile info">
        <section class="px-6">
            <form method="POST" action="/profile" enctype="multipart/form-data">
                @csrf
                <section class="bg-gray-300 px-6 py-6 rounded-xl mb-6">
                    <h1 class="font-bold mb-5">Change your name and username</h1>
                    <x-form.input input="name" name="New name" type="text" placeholder="Your current name: {{ auth()->user()->name }}"/>
                    <x-form.input input="username" name="New name" type="text" placeholder="Your current username: {{ auth()->user()->username }}"/>
                </section>


                <section class="bg-gray-300 px-6 py-6 rounded-xl mb-6">
                    <h3 class="font-bold mb-5">Change your avatar</h3>
                    <x-form.input input="avatar" name="New avatar" type="file"/>
                </section>

                <section class="bg-gray-300 px-6 py-6 rounded-xl mb-6">
                    <h4 class="font-bold mb-5">Change your password</h4>
                    <x-form.input input="password" name="New password" type="password" autocomplete="password"/>
                    <x-form.input input="password_confirmation" name="Confirm new password" type="password" autocomplete="password"/>
                </section>

                <x-form.button>Save</x-form.button>
            </form>
        </section>
    </x-setting>
</x-layout>
