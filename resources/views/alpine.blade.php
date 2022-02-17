<x-guest-layout>
    <form action="/contact" method="get" x-data="contactForm()" @submit.prevent="submitData" class="w-64 mx-auto">
        <div class="mb-4">
            <label class="block mb-2">Name:</label>
            <input type="text" x-model="formData.name" name="name" class="border w-full p-1">
        </div>
        <div class="mb-4">
            <label class="block mb-2">E-mail:</label>
            <input type="email" x-model="formData.email" name="email" class="border w-full p-1">
        </div>
        <div class="mb-4">
            <label class="block mb-2">Message:</label>
            <textarea name="message" x-model="formData.message" class="border w-full p-1"></textarea>
        </div>
        <button class="bg-gray-700 hover:bg-gray-800 text-white w-full p-2">Submit</button>
        <p x-text="message"></p>
    </form>
    <script>
        function contactForm() {
            return {
                formData: {
                    name: '',
                    email: '',
                    message: ''
                },
                message: '',

                submitData() {
                    this.message = ''

                    fetch('/contact', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify(this.formData)
                    })
                    .then((data) => {
                        this.message = 'Form sucessfully submitted!'
                    })
                    .catch(() => {
                        this.message = 'Ooops! Something went wrong!'
                    })
                }
            }
        }
    </script>
</x-guest-layout>
