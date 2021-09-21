<template>
  <div>
      <!-- This is an example component -->
        <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
        />
        <!-- Header -->

        <div class="bg-white flex justify-around py-6">
            <div class="flex justify-between text-center space-x-3 items-center">
                <img :src="'assets/img/form.png'" alt="">
                <span class="text-2xl">Titulo da empresa</span>
            </div>

            <div class="flex ">
                <div class='bg-purple-400 rounded-full p-2 '>
                   PLACEHOLDERS
                </div>
            </div>
        </div>

        <div class="bg-purple-200 flex min-h-screen">
        <div class="flex-col flex ml-auto mr-auto items-center w-full lg:w-2/3 md:w-3/5">
            <h1 class="font-bold text-2xl my-10 text-white"> Bem vindo </h1>
        <form action="/login" method="GET" class="mt-2 flex flex-col lg:w-1/2 w-8/12">
                <div class="flex flex-wrap items-stretch w-full mb-4 relative h-15 bg-white items-center rounded mb-6 pr-10">
                    <div class="flex -mr-px justify-center w-15 p-4">
                    <span
                        class="flex items-center leading-normal bg-white px-3 border-0 rounded rounded-r-none text-2xl text-gray-600"
                    >
                        <i class="fas fa-user-circle"></i>
                    </span>
                    </div>
                    <input
                    name = "email"
                    v-model="formData.email"
                    type="text"
                    class="flex-shrink flex-grow flex-auto leading-normal w-px flex-1 border-0 h-10 border-grey-light rounded rounded-l-none px-3 self-center relative  font-roboto text-xl outline-none"
                    placeholder="Email"
                    />
                </div>
                <div class="flex flex-wrap items-stretch w-full relative h-15 bg-white items-ceter rounded mb-4">
                    <div class="flex -mr-px justify-center w-15 p-4">
                    <span
                        class="flex items-center leading-normal bg-white rounded rounded-r-none text-xl px-3 whitespace-no-wrap text-gray-600"
                        > 
                        <i class="fas fa-lock"></i>
                        </span
                    >
                    </div>
                    <input
                    name="password"
                    v-model="formData.password"
                    type="password"
                    class="flex-shrink flex-grow flex-auto leading-normal w-px flex-1 border-0 h-10 px-3 relative self-center font-roboto text-xl outline-none"
                    placeholder="Senha"
                    />
                    <div class="flex -mr-px">
                    <span
                        class="flex items-center leading-normal bg-white rounded rounded-l-none border-0 px-3 whitespace-no-wrap text-gray-600"
                        >
                        <i class="fas fa-eye-slash"></i>
                        </span>
                    </div>
                </div>
                <a href="#" class="text-base text-white text-right font-roboto leading-normal hover:underline mb-6">Esqueceu a senha ?</a>
                <button v-on:click.self.prevent="handleLogin" class="bg-blue-400 py-4 text-center px-17 md:px-12 md:py-4 text-white rounded leading-tight text-xl md:text-base font-sans mt-4 mb-20">
                    Entrar
                </button>
                </form>
        </div>
    </div>
  </div>
</template>

<script>
export default {

    data () {
        return {
            formData: {
                email: '',
                password: ''
            }
        }
    },

    created() {
        
        axios.get('/sanctum/csrf-cookie').then(response => {})
    },

    methods:{
        getUser () {
            axios.get('/api/user').then(res => {
                    console.log(res.data)
            }).catch((error) => {
                console.log(error);
            })
        },

        handleLogin () {
            axios.post('/login', this.formData).then(response => {
                console.log(this.formData)
                this.getUser();
            })
        },

    }
}
</script>

<style>

</style>