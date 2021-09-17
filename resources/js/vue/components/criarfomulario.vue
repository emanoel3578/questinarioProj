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
                <div class='bg-purple-400 rounded-full p-2 '>
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
    <div class="bg-purple-200 min-h-screen">
        <div class="bg-purple-200 flex flex-col w-1/2 mx-auto my-0 items-center">
            <div class="bg-purple-200 w-full mt-3 flex flex-col items-center justify-center">
                <div class="bg-purple-200 flex flex-col gap-4 w-full">
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
                                <img @click="newPergunta" :src="'assets/img/plus.png'" class="w-8 h-8 cursor-pointer" alt="">
                                <img @click="deletePergunta" :src="'assets/img/minus.png'" class="w-8 h-8 cursor-pointer" alt="">
                            </div>
                        </div>
                    </div>
                    <!-- End titulo -->

                    <!-- Corpo do formualario -->

                    <!-- Div que apareçe para o usuario -->
                    <div id="perguntaDivOriginal" class="bg-white rounded-3xl p-4 border-l-8 border-pink-800">
                        <div class="flex flex-col px-4">
                            <div class="flex pb-4 gap-4">
                                <input class="focus:border-black w-full focus:outline-none border-b-2 py-2 px-3 text-grey-darkest" type="text" placeholder="Insira sua pergunta">
                            
                                <select class="rounded-full border-2 border-blue-500 focus:outline-none p-2" name="tipoQuestao" id="">
                                    <option class="text-center" value="">Multipla escolha</option>
                                    <option class="text-center" value="">Paragrafo</option>
                                    <option class="text-center" value="">Checkbox</option>
                                </select>
                            </div>


                            <!-- Respostas para Multiplaescolha -->
                            
                            <div class="flex flex-col justify-center gap-4">
                                <div class="flex items-center" id="option">
                                    <img :src="'assets/img/multiplechoice.png'" class="w-5 h-full" alt="">
                                    <input class="focus:border-black w-1/2 focus:outline-none border-b-2 py-2 px-3 text-grey-darkest" type="text" placeholder="Resposta">
                                </div>
                                
                                <div class="addResposta">
                                    <img @click="newOption" :src="'assets/img/plus.png'" class="cursor-pointer w-6 mt-8" alt="">
                                </div>
                            </div> 


                            <!-- Respostas para Paragráfo
                            <div>
                                <div>
                                    <textarea class="border-2 border-black w-1/2" placeholder="Digite a resposta em forma de texto">
                                    </textarea>
                                </div>
                                <div>
                                    <img @click :src="'assets/img/plus.png'" class="cursor-pointer w-6 mt-8" alt="">
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



                    <!-- Div escondida para clonagem, o usuario não altera ela -->
                    <div id="perguntaDiv" class="bg-white rounded-3xl p-4 border-l-8 border-pink-800 perguntaDivClone hidden">
                        <div class="flex flex-col px-4">
                            <div class="flex pb-4 gap-4">
                                <input class="focus:border-black w-full focus:outline-none border-b-2 py-2 px-3 text-grey-darkest" type="text" placeholder="Insira sua pergunta">
                            
                                <select class="rounded-full border-2 border-blue-500 focus:outline-none p-2" name="tipoQuestao" id="">
                                    <option class="text-center" value="">Multipla escolha</option>
                                    <option class="text-center" value="">Paragrafo</option>
                                    <option class="text-center" value="">Checkbox</option>
                                </select>
                            </div>


                            <!-- Respostas para Multiplaescolha -->
                            
                            <div id="optionClone" class="flex flex-col justify-center gap-4">
                                <div class="flex items-center" id="option">
                                    <img :src="'assets/img/multiplechoice.png'" class="w-5 h-full" alt="">
                                    <input class="focus:border-black w-1/2 focus:outline-none border-b-2 py-2 px-3 text-grey-darkest" type="text" placeholder="Resposta">
                                </div>
                            </div>

                            <div id="optionCloneErase" class="hidden justify-center gap-4">
                                <div class="flex items-center" id="option">
                                    <img :src="'assets/img/multiplechoice.png'" class="w-5 h-full" alt="">
                                    <input class="focus:border-black w-1/2 focus:outline-none border-b-2 py-2 px-3 text-grey-darkest" type="text" placeholder="Resposta">
                                    <img src="assets/img/delete.png" class="w-12 h-full cursor-pointer  deleteResposta" alt="">
                                </div>
                            </div> 

                            <div class="addResposta">
                                <img @click="newOption" :src="'assets/img/plus.png'" class="cursor-pointer w-6 mt-8" alt="">
                            </div>

                            <!-- Respostas para Paragráfo
                            <div>
                                <div>
                                    <textarea class="border-2 border-black w-1/2" placeholder="Digite a resposta em forma de texto">
                                    </textarea>
                                </div>
                                <div>
                                    <img @click :src="'assets/img/plus.png'" class="cursor-pointer w-6 mt-8" alt="">
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
                    <!-- Fim da div para clonagem  -->                    
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
        newOption(event){
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

            container.appendChild(imgContainer)
            container.appendChild(inputContainer)
            container.appendChild(closeContainer)

            var placetoPutQuestion = event.target
            placetoPutQuestion.before(container)

            function deleteInput(e) { 
                e.path[1].remove()
            }

            document.querySelectorAll(".deleteResposta").forEach(function(element) {
                element.addEventListener("click", function(e) {deleteInput(e)} )
            });

        },

        deleteQuestion() {
            // Verificar Pure JS,no topo da tag script
        },

        newPergunta() {
            var perguntaDivClone = document.getElementsByClassName("perguntaDivClone")[0].cloneNode(true)
            perguntaDivClone.className = "bg-white rounded-3xl p-4 border-l-8 border-pink-800 perguntaDivClone"
            document.getElementsByClassName("perguntaDivClone")[document.getElementsByClassName("perguntaDivClone").length - 1].after(perguntaDivClone)

            function cloneOption (e) {
                document.getElementById("optionCloneErase").className = "justify-center gap-4"
                var optionClone = document.getElementById("optionCloneErase").cloneNode(true)
                e.target.before(optionClone)
                document.getElementById("optionCloneErase").className = "hidden justify-center gap-4"


                function deleteInput(a) { 
                    a.path[1].remove()
                }
          
                document.querySelectorAll(".deleteResposta").forEach(function(element) {
                    element.addEventListener("click", function(e) {deleteInput(e)} )
                });

            }

            var newPerguntaAdd = document.getElementsByClassName("addResposta")
            newPerguntaAdd[newPerguntaAdd.length-1].children[0].addEventListener("click", function(e) {cloneOption(e)} )
        },

        deletePergunta() {
            if ((document.getElementsByClassName("perguntaDivClone").length) > 1) {
                document.getElementsByClassName("perguntaDivClone")[(document.getElementsByClassName("perguntaDivClone").length) - 1].remove()
            }
        }

    }

}
</script>

<style>

</style>