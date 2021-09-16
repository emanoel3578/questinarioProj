<template>
  <div>
      <!-- Header -->
      <div class="bg-blue-500 flex justify-around mx-auto my-0">
          <div class="flex w-1/5 justify-between">
            <img :src="'assets/img/form.png'" alt="">
            <span>Formulário sem nome</span>
          </div>

          <div class="flex justify-end w-3/5">
            <div class='bg-purple-400'>
                Enviar formulario
            </div>
          </div>
      </div>

        <!-- Body -->
        <div class="bg-gray-500 h-full relative">
            <div class="flex flex-col h-full justify-center items-center">
                <div class="bg-white container h-full flex flex-col items-center justify-center">
                    <!-- Header Menu -->
                    <div class="flex gap-3 justify-center border-t-6 bg-red-200">
                        <span class="border-b-2 border-pink-500">Questões</span>
                        <span class="border-b-2 border-pink-500">Respostas</span>
                        <span class="border-b-2 border-pink-500">Configurações</span>
                    </div>

                    <div class="border-4 w-full h-full border-black">
                        <!-- Titulo do formulario -->
                        <div class="flex border-4 justify-between border-blue-500 ">
                            <div class="flex flex-col">
                                <div class="text-2xl">
                                    Titulo do fomulario
                                </div>

                                <div class="text-lg">
                                    descricao
                                </div>
                            </div>

                            <div class="flex gap-4 mr-4">
                                <img :src="'assets/img/plus.png'" class="cursor-pointer" alt="">
                                <img :src="'assets/img/plus.png'" class="cursor-pointer" alt="">
                                <img :src="'assets/img/plus.png'" class="cursor-pointer" alt="">
                            </div>

                            
                        </div>
                        <!-- End titulo -->

                        <!-- Corpo do formualario -->
                        <div class="flex">
                            <div class="px-8 border-l-8 border-pink-800">
                                <div class="flex justify-around">
                                    <div>
                                        <input type="text" placeholder="Insira sua pergunta">
                                    </div>

                                    <div class="">
                                        <select name="tipoQuestao" id="">
                                            <option value="">Multipla escolha</option>
                                            <option value="">Paragrafo</option>
                                            <option value="">Checkbox</option>
                                        </select>
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


                                <!-- Respostas para Multiplaescolha -->
                                <div>
                                    <div class="flex" id="option">
                                        <img :src="'assets/img/multiplechoice.png'" class="px-2 py-1" alt="">
                                        <input type="text" placeholder="Opção 1">
                                    </div>
                                    
                                    <div id="addResposta">
                                        <img @click="newQuestion" :src="'assets/img/plus.png'" class="cursor-pointer px-1 py-1" alt="">
                                    </div>
                                </div>

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
        // 

        // document.getElementsByClassName("deleteResposta").addEventListener("click", consoleCLick)

    },

    methods:{
        newQuestion(){
            var container = document.createElement('div')
            container.className = "flex"
            var inputContainer = document.createElement('input')
            inputContainer.placeholder = "Resposta"
            var imgContainer = document.createElement('img')
            imgContainer.src = "assets/img/multiplechoice.png"
            imgContainer.className = "px-2 py-1"
            var closeContainer = document.createElement('img')
            closeContainer.src = "assets/img/delete.png"
            closeContainer.className = "px-2 cursor-pointer deleteResposta"
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