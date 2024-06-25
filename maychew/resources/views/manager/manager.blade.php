<x-layout_manager :user="$user">
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script src="//unpkg.com/alpinejs" defer></script>
        <x-header />
        <title>HEALTH OFFICER</title>
        <style>
            body {
                /* background: rgb(147,197,253);
                background: linear-gradient(20deg, rgba(147,197,253,1) 18%, rgba(219,234,254,1) 48%, rgba(147,197,253,1) 84%);                 */
                background-repeat: no-repeat;
                background-size: cover;
                min-height: 100vh; 
                margin: 0; 
                display: flex;
                flex-direction: column;
            }
            .content {
                flex: 1;
            }
        </style>
    </head>
    <body>
        <div class="content container mx-auto px-4 py-8">
            <h2 class="text-2xl font-bold mb-4">Employee Information</h2>
            <div class="overflow-x-auto">
                <table class="table-auto bg-gray-100 border-collapse border border-gray-400 w-full">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="px-4 py-2">ID</th>
                            <th class="px-4 py-2">Name</th>
                            <th class="px-4 py-2">Email</th>
                            <th class="px-4 py-2">Specialization</th>
                            <th class="px-4 py-2">Department</th>
                            <th class="px-4 py-2">Role</th>
                            <th class="px-4 py-2">Edit</th>
                            <th class="px-4 py-2">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <x-list_user_manager :users="$users" :user="$user"/>
                    </tbody>
                </table>
            </div>
        </div>

        <script>
            function showRegistrationForm() {
                document.getElementById('registrationForm').classList.remove('hidden');
            }

            function showEditForm() {
                document.getElementById('editForm').classList.remove('hidden');
            }
        </script>
    </body>
    </html>
</x-layout_manager>
