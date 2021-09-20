<template>
  <div>
    <!-- Header -->
    <div class="z-10 bg-white flex flex-col">
        <div class="flex justify-around items-center mt-3">
            <div class="flex justify-between text-center space-x-3 items-center">
                <img :src="'assets/img/form.png'" alt="">
                <span class="text-2xl">Formulário sem nome</span>
            </div>

            <div class="flex justify-end ">
                <div class='bg-purple-400 rounded-full p-2 cursor-pointer'>
                    Login
                </div>
            </div>
        </div>
            <div class="flex gap-8 justify-center">
                <span aria-label="Nessa aba você pode criar suas perguntas !" data-balloon-length="medium" data-balloon-pos="down" class="border-b-2 border-pink-500 cursor-pointer">Formulários disponiveis</span>
            </div>
    </div>

        <!-- Body -->
    <div class="bg-purple-200 min-h-screen">
        <div class="bg-purple-200 flex flex-col w-1/2 mx-auto my-0 items-center">
            <div class="bg-purple-200 w-full mt-3 flex flex-col items-center justify-center">
                <div class="bg-purple-200 flex flex-col gap-4 w-full">

                    <div class="bg-white rounded-full w-full p-4">
                        <div class="flex justify-around items-center">
                            <div>
                                <p class="text-black text-2xl">
                                    Titulo do formulario
                                </p>
                                <p class="text-black text-sm">
                                    Descricao do formulario
                                </p>
                                <p class="text-black text-xs">
                                    Autor: Direção
                                </p>
                            </div>

                            <div class="text-center">
                                <p>
                                    Data de criação:
                                </p>
                                <p class="text-sm">
                                     21/08/2021
                                </p>
                            </div>

                            <div class="cursor-pointer text-white bg-blue-500 rounded-full p-2">
                                Responder !
                            </div>
                        </div>
                    </div>    

                    <div class="bg-white rounded-full w-full p-4">
                        <div class="flex justify-around items-center">
                            <div class="flex flex-col w-full">
                                <input  class="w-full" name="email" type="text" placeholder="Login Email">
                                <input  @model:"formData.password" name="password" class="w-full" type="text" placeholder="Password">
                                <button @click="handleLogin" class="rounder-full p-2 border-blue-400 border-2">Verificar Login</button>
                            </div>
                        </div>
                    </div>  
                               
                </div>
            </div>
        </div>
    </div>
        <!-- endBody -->
  </div>
</template>

<script>

export default {
    name:'Formulario',
    data() {
        return {
            eventname: 'change',
            isMultiplaEscolha: true,
            isParagrafo: false,
            isCheckbox: false,
            formData:{
                email: 'emanoel357@gmail.com',
                password: 'Manel123'
            }
            
        }
    },

    created() {
        axios.get('/sanctum/csrf-cookie').then(response => {
            this.getUser()
        })
    },      

    methods:{
        getUser () {
            axios.get('/api/user').then(response => {
                console.log(response.data)
            })
        },

        handleLogin () {
            axios.post('/login', this.formData).then(response => {
                this.getUser();
            })
        },

    }

}
</script>

<style>

</style>