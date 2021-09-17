<template>
  <div>
      <!-- Header -->
    <div class="z-10 bg-white w-full h-full flex flex-col ">
        <div class="flex justify-around items-center mt-3">
            <div class="flex justify-between items-center">
                <img :src="'assets/img/form.png'" alt="">
                <span>Formulário sem nome</span>
            </div>

            <div class="flex justify-end ">
                <div class='bg-purple-400 rounded-full p-1 '>
                    Enviar formulario
                </div>
            </div>
        </div>
            <div class="flex gap-3 justify-center">
                <span class="border-b-2 border-pink-500">Questoes</span>
                <span class="border-b-2 border-pink-500">Respostas</span>
                <span class="border-b-2 border-pink-500">Configurações</span>
            </div>
    </div>

        <!-- Body -->
        <div class="bg-purple-200 absolute inset-x-0 h-full">
            <div class="flex flex-col w-1/2 h-full mx-auto my-0 items-center">
                <div class="h-full mt-3 w-full flex flex-col items-center justify-center">
                    <div class="flex flex-col gap-4 bg-purple-200 w-full h-full">
                        <!-- Titulo do formulario -->

                        <div class="flex w-full">
                            <div class="bg-white flex border-t-8 border-blue-500 justify-between rounded-3xl p-4 w-full">
                                <div class="flex flex-col text-2xl w-full">
                                    <input class="text-2xl w-1/2 focus:border-black focus:outline-none border-b-2 py-2 px-3 text-grey-darkest" type="text" placeholder="Título">
                                    <input class="text-lg focus:border-black focus:outline-none border-b-2 py-2 px-3 text-grey-darkest" type="text" placeholder="Descrição">
                                </div>
                            </div>

                            <div class="bg-white ml-2 rounded-full">
                                <div class="flex flex-col gap-4 p-2 mt-4">
                                    <img :src="'assets/img/plus.png'" class="w-8 h-8 cursor-pointer" alt="">
                                    <img :src="'assets/img/plus.png'" class="w-8 h-8 cursor-pointer" alt="">
                                </div>
                            </div>
                        </div>
                        <!-- End titulo -->

                        <!-- Corpo do formualario -->
                        <div class="bg-white rounded-3xl p-4 border-l-8 border-pink-800">
                            <div class="flex flex-col px-4">
                                <div class="flex pb-4 gap-4">
                                    <input class="focus:border-black w-full focus:outline-none border-b-2 py-2 px-3 text-grey-darkest" type="text" placeholder="Insira sua pergunta">
                                
                                    <select name="tipoQuestao" id="">
                                        <option value="">Multipla escolha</option>
                                        <option value="">Paragrafo</option>
                                        <option value="">Checkbox</option>
                                    </select>
                                </div>


                                <!-- Respostas para Multiplaescolha -->
                                <div class="flex flex-col justify-center gap-4">
                                    <div class="flex items-center" id="option">
                                        <img :src="'assets/img/multiplechoice.png'" class="w-5 h-full" alt="">
                                        <input class="focus:border-black w-1/2 focus:outline-none border-b-2 py-2 px-3 text-grey-darkest" type="text" placeholder="Resposta">
                                    </div>
                                    
                                    <div id="addResposta">
                                        <img @click="newQuestion" :src="'assets/img/plus.png'" class="cursor-pointer w-6 mt-8" alt="">
                                    </div>
                                </div>


                                <!-- Opção de respostas -->
                                <!-- Respostas para Paragráfo -->
                                <!-- <div>
                                    <div>
                                        <input type="text" placeholder="Opção 1">
                                    </div>
                                    <div>
                                        <img :src="'assets/img/plus.png'" class="px-1 py-1" alt="">
                                    </div>
                                </div> -->


                                <!-- Resposta para Checkbox -->
                                <!-- <div class="flex flex-col gap-1">
                                    <div class="flex items-center">
                                        <input id="option" type="checkbox">
                                        <label for="option">Opção 1 </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="option" type="checkbox">
                                        <label for="option">Opção 1 </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="option" type="checkbox">
                                        <label for="option">Opção 1 </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="option" type="checkbox">
                                        <label for="option">Opção 1 </label>
                                    </div>
                                    <div>
                                        <img :src="'assets/img/plus.png'" class="px-1 py-1" alt="">
                                    </div>
                                </div> -->
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

        }
    },

    mounted() {
        // document.getElementsByClassName("deleteResposta").addEventListener("click", consoleCLick)
    },

    methods:{
        newQuestion(){
            var container = document.createElement('div')
            container.className = "flex items-center"
            var inputContainer = document.createElement('input')
            inputContainer.placeholder = "Resposta"
            inputContainer.className = "focus:border-black w-1/2 focus:outline-none border-b-2 py-2 px-3 text-grey-darkest"
            var imgContainer = document.createElement('img')
            imgContainer.src = "assets/img/multiplechoice.png"
            imgContainer.className = "w-5 h-full"
            var closeContainer = document.createElement('img')
            closeContainer.src = "assets/img/delete.png"
            closeContainer.className = "w-12 h-full cursor-pointer deleteResposta"
            closeContainer.id = Math.random()

            container.appendChild(imgContainer)
            container.appendChild(inputContainer)
            container.appendChild(closeContainer)

            var placetoPutQuestion = document.getElementById("addResposta")
            placetoPutQuestion.before(container)

            function deleteInput(event) { 
                document.getElementById(event.target.id).removeEventListener("click", deleteInput)
                event.path[1].remove()
                
            }

            var deleteArr = document.getElementsByClassName("deleteResposta")

            deleteArr[deleteArr.length-1].addEventListener("click", function() {deleteInput(event)} )

        },

        deleteQuestion() {
            // Verificar Pure JS,no topo da tag script
        }

    }

}
</script>

<style>

</style>