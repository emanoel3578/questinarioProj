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
            <div class="flex gap-8 justify-center">
                <span @click="changeShowDiv" value="questoes" aria-label="Nessa aba você pode criar suas perguntas !" data-balloon-length="medium" data-balloon-pos="down" class="border-b-2 border-pink-500 cursor-pointer">Questões</span>
                <span @click="changeShowDiv" value="resposta" aria-label="Verifique aqui as respotas submetidas ao seu formulário." data-balloon-length="medium" data-balloon-pos="down" class="border-b-2 border-pink-500 cursor-pointer">Respostas</span>
            </div>
    </div>

        <!-- Body -->
    <div class="bg-purple-200 min-h-screen">
        <div class="bg-purple-200 flex flex-col w-1/2 mx-auto my-0 items-center">
            <div class="bg-purple-200 w-full mt-3 flex flex-col items-center justify-center">
                <div class="bg-purple-200 w-full">

                    <!-- Titulo do formulario -->
                    <div v-show="questionShow" class="flex flex-col gap-4 mb-8">
                        <div class="flex w-full ">
                            <div class="bg-white flex border-t-8 border-blue-500 justify-between rounded-3xl p-4 w-full">
                                <div class="flex flex-col text-2xl w-full">
                                    <input class="text-2xl w-1/2 focus:border-black focus:outline-none border-b-2 py-2 px-3 text-grey-darkest" type="text" placeholder="Título">
                                    <input class="text-lg focus:border-black focus:outline-none border-b-2 py-2 px-3 text-grey-darkest" type="text" placeholder="Descrição">
                                </div>
                            </div>

                            <div class="bg-white ml-2 rounded-full">
                                <div class="flex flex-col gap-4 p-2 mt-4">
                                    <div aria-label="Adicionar perguntas" data-balloon-pos="up">
                                        <img @click="newPergunta" :src="'assets/img/plus.png'" class="w-8 h-8 cursor-pointer" alt="">
                                    </div>
                                    <div aria-label="Remover perguntas" data-balloon-pos="up">
                                        <img @click="deletePergunta" :src="'assets/img/minus.png'" class="w-8 h-8 cursor-pointer" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End titulo -->

                        <!-- Corpo do formualario -->

                        <!-- Div que apareçe para o usuario -->
                        <div id="perguntaDivOriginal" class="bg-white rounded-3xl p-4 border-l-8 border-pink-800 mb-5">
                            <div class="flex flex-col px-4">
                                <div class="flex pb-4 gap-4">
                                    <input class="focus:border-black w-full focus:outline-none border-b-2 py-2 px-3 text-grey-darkest" type="text" placeholder="Insira sua pergunta">
                                
                                    <select @change="respostaType" class="rounded-full border-2 border-blue-500 focus:outline-none p-2" name="tipoQuestao" id="">
                                        <option class="text-center" value="multipla">Multipla escolha</option>
                                        <option class="text-center" value="paragrafo">Paragrafo</option>
                                        <option class="text-center" value="checkbox">Checkbox</option>
                                    </select>
                                </div>


                                <!-- Respostas para Multiplaescolha -->
                                
                                <div v-show="isMultiplaEscolha" class="flex flex-col justify-center gap-4">
                                    <div class="flex items-center" id="option">
                                        <img :src="'assets/img/multiplechoice.png'" class="w-5 h-full" alt="">
                                        <input class="w-1/2 focus:outline-none border-b-2 py-2 px-3 text-grey-darkest" type="text" placeholder="Resposta">
                                    </div>
                                    
                                    <div class="addResposta" aria-label="Adicionar opção de resposta" data-balloon-pos="down-left">
                                        <img @click="newOption" :src="'assets/img/plus.png'" class="cursor-pointer w-6 mt-8" alt="">
                                    </div>
                                </div> 


                                <!-- Respostas para Paragráfo-->
                                <div v-show="isParagrafo">
                                    <div>
                                        <textarea class="border-2 border-black w-1/2 p-2 rounded-xl" placeholder="Digite a resposta em forma de texto">
                                        </textarea>
                                    </div>
                                </div> 


                                <!-- Resposta para Checkbox -->
                                <div v-show="isCheckbox" class="flex flex-col gap-1">
                                    <div class="flex items-center space-x-2 checkboxOption">
                                        <input id="option" class="focus:outline-none" type="checkbox">
                                        <input class="focus:border-black w-1/2 focus:outline-none border-b-2 py-2 px-3 text-grey-darkest" type="text" placeholder="Opcao">
                                    </div>
                                    <div>
                                        <img @click="newCheckbox" :src="'assets/img/plus.png'" class="cursor-pointer w-6 mt-8" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>



                        <!-- Div escondida para clonagem, o usuario não altera ela -->
                        <div id="perguntaDiv" class="bg-white rounded-3xl p-4 border-l-8 border-pink-800 perguntaDivClone hidden">
                            <div class="flex flex-col px-4">
                                <div class="flex pb-4 gap-4">
                                    <input class="focus:border-black w-full focus:outline-none border-b-2 py-2 px-3 text-grey-darkest" type="text" placeholder="Insira sua pergunta">
                                    <select class="rounded-full border-2 border-blue-500 focus:outline-none p-2 selectCopied" name="tipoQuestao" id="">
                                        <option class="text-center" value="multipla">Multipla escolha</option>
                                        <option class="text-center" value="paragrafo">Paragrafo</option>
                                        <option class="text-center" value="checkbox">Checkbox</option>
                                    </select>
                                </div>


                                <!-- Respostas para Multiplaescolha -->
                                
                                <div id="optionClone" class="flex-col justify-center gap-4 multipla">
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

                                <!-- Respostas para Paragráfo-->
                                <div class="paragrafo hidden">
                                    <div>
                                        <textarea class="border-2 border-black w-1/2 p-2 rounded-xl" placeholder="Digite a resposta em forma de texto">
                                        </textarea>
                                    </div>
                                </div> 

                                <!-- Resposta para Checkbox -->
                                <div class="flex-col gap-1 checkbox hidden">
                                    <div class="flex items-center space-x-2 checkboxOption">
                                        <input id="option" class="focus:outline-none" type="checkbox">
                                        <input class="focus:border-black w-1/2 focus:outline-none border-b-2 py-2 px-3 text-grey-darkest" type="text" placeholder="Opcao">
                                    </div>

                                    <div>
                                        <img @click="newCheckbox" :src="'assets/img/plus.png'" class="newCheckbox cursor-pointer w-6 mt-8" alt="">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- Fim da div principal  --> 

                    <div v-show="respostaShow">
                        <div>
                            <div class="flex flex-col gap-6 w-full ">
                                <div class="bg-white flex flex-col border-t-8 border-blue-500 rounded-3xl p-4 w-full">
                                    
                                    <div>
                                        <div class="flex w-full justify-between">
                                            <div class="flex text-2xl gap-2">
                                                <div class="font-bold">
                                                    99
                                                </div>

                                                <div class="font-light">
                                                    Respostas
                                                </div>
                                            </div>

                                            <div class="flex flex-col items-center justify-center">
                                                <div>
                                                    Aceitar respostas:
                                                </div>
                                                <div>
                                                    <label class="switch">
                                                    <input type="checkbox" id="togBtn">
                                                    <div class="slider round"></div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <div class="flex justify-between px-4 pb-2">
                                            <div class="border-b-2 border-purple-800">
                                                <span>
                                                    Summary
                                                </span>
                                            </div>

                                            <div class="border-b-2 border-purple-800">
                                                <span>
                                                    Question
                                                </span>
                                            </div>

                                            <div class="border-b-2 border-purple-800">
                                                <span>
                                                    Individual
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                
                                <!-- Perguntas -->
                                <div class="bg-white flex flex-col border-t-8 border-blue-500 rounded-3xl p-4 w-full">
                                    <div class="pb-6">
                                        <div class="text-2xl">
                                            A pergunta em si 1 
                                        </div>

                                        <div class="text-sm">
                                            O tanto de respostas para essa pergunta
                                        </div>
                                    </div>

                                    <div>
                                        Grafico
                                    </div>
                                </div>

                                <div class="bg-white flex flex-col border-t-8 border-blue-500 rounded-3xl p-4 w-full">
                                    <div class="pb-6">
                                        <div class="text-2xl">
                                            A pergunta em si 1 
                                        </div>

                                        <div class="text-sm">
                                            O tanto de respostas para essa pergunta
                                        </div>
                                    </div>

                                    <div>
                                        Grafico
                                    </div>
                                </div>
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
            questionShow: true,
            respostaShow: false,
        }
    },

    methods:{

        changeShowDiv(event) {
            console.log(event.target.innerHTML)
            if (event.target.innerHTML == "Questões") {
                this.questionShow = true;
                this.respostaShow = false;
            }else if (event.target.innerHTML == "Respostas"){
                this.questionShow = false;
                this.respostaShow = true;
            }
        },



        respostaType(event) {
            if (event.target.value == "multipla") {
                this.isMultiplaEscolha = true
                this.isParagrafo = false
                this.isCheckbox = false
            }else if (event.target.value == "paragrafo") {
                this.isParagrafo = true
                this.isMultiplaEscolha = false
                this.isCheckbox = false
            }else if (event.target.value == "checkbox") {
                this.isCheckbox = true
                this.isParagrafo = false
                this.isMultiplaEscolha = false
            }
        },

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

            document.querySelectorAll(".deleteCheckbox").forEach(function(element) {
                element.addEventListener("click", function(e) {deleteCheckbox(e)} )
            });

            function changeLocalResponseType(i) {
                if (i.target.value == "multipla") {
                    i.path[3].getElementsByClassName("multipla")[0].className = "multipla flex flex-col justify-center gap-4 block"
                    i.path[3].getElementsByClassName("paragrafo")[0].className = "paragrafo hidden"
                    i.path[3].getElementsByClassName("checkbox")[0].className = "flex flex-col gap-1 checkbox hidden"
                    i.path[3].getElementsByClassName("addResposta")[0].className = "addResposta"
                }else if (i.target.value == "paragrafo") {
                    i.path[3].getElementsByClassName("multipla")[0].className = "multipla flex-col justify-center gap-4 hidden  "
                    i.path[3].getElementsByClassName("paragrafo")[0].className = "paragrafo block"
                    i.path[3].getElementsByClassName("checkbox")[0].className = "flex flex-col gap-1 checkbox hidden"
                    i.path[3].getElementsByClassName("addResposta")[0].className = "addResposta hidden"
                }else if (i.target.value == "checkbox") {
                    i.path[3].getElementsByClassName("multipla")[0].className = "multipla flex-col justify-center gap-4 hidden "
                    i.path[3].getElementsByClassName("paragrafo")[0].className = "paragrafo hidden"
                    i.path[3].getElementsByClassName("checkbox")[0].className = "flex flex-col gap-1 checkbox block"
                    i.path[3].getElementsByClassName("addResposta")[0].className = "addResposta hidden"
                }
            }

            document.querySelectorAll(".selectCopied").forEach((element) => {
                element.addEventListener("change", (i) => {changeLocalResponseType(i)} )
            });

            function newCheckbox(q) {
                var checkboxClone = document.getElementsByClassName("checkboxOption")[0].cloneNode(true)
                var deleteImg = document.createElement("img")
                deleteImg.src="assets/img/delete.png"
                deleteImg.className = "w-12 h-full cursor-pointer deleteCheckbox"
                checkboxClone.appendChild(deleteImg)
                q.target.before(checkboxClone)


                function deleteCheckbox(h) { 
                    h.path[1].remove()
                }

                document.querySelectorAll(".deleteCheckbox").forEach(function(element) {
                    element.addEventListener("click", function(h) {deleteCheckbox(h)} )
                });

            }

            document.querySelectorAll(".newCheckbox").forEach(function(element) {
                element.addEventListener("click", function(q) {newCheckbox(q)} )
            });

        },

        deletePergunta() {
            if ((document.getElementsByClassName("perguntaDivClone").length) > 1) {
                document.getElementsByClassName("perguntaDivClone")[(document.getElementsByClassName("perguntaDivClone").length) - 1].remove()
            }
        },

        newCheckbox (event) {
            var checkboxClone = document.getElementsByClassName("checkboxOption")[0].cloneNode(true)
            var deleteImg = document.createElement("img")
            deleteImg.src="assets/img/delete.png"
            deleteImg.className = "w-12 h-full cursor-pointer deleteCheckbox"
            checkboxClone.appendChild(deleteImg)
            event.target.before(checkboxClone)


            function deleteCheckbox(e) { 
                e.path[1].remove()
            }

            document.querySelectorAll(".deleteCheckbox").forEach(function(element) {
                element.addEventListener("click", function(e) {deleteCheckbox(e)} )
            });

        },

    }

}
</script>

<style scoped>
.switch {
  position: relative;
  display: inline-block;
  width: 90px;
  height: 34px;
}

.switch input {display:none;}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #4293f5;
  -webkit-transition: .4s;
  transition: .4s;
   border-radius: 34px;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
  border-radius: 50%;
}

input:checked + .slider {
  background-color: #2ab934;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(55px);
}

/*------ ADDED CSS ---------*/
.slider:after
{
 content:'OFF';
 color: white;
 display: block;
 position: absolute;
 transform: translate(-50%,-50%);
 top: 50%;
 left: 50%;
 font-size: 10px;
 font-family: Verdana, sans-serif;
}

input:checked + .slider:after
{  
  content:'ON';
}
</style>