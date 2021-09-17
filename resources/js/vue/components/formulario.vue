<template>
  <div>
    <!-- Body -->
    <div class="bg-purple-200 min-h-screen">
        <div class="bg-purple-200 flex flex-col w-1/2 mx-auto my-0 items-center">
            <div class="bg-purple-200 w-full mt-3 flex flex-col items-center justify-center">
                <div class="bg-purple-200 mb-10 flex flex-col gap-4 w-full">

                    <div class="bg-white rounded-b-xl rounded-t-2xl border-t-8 border-purple-500 w-full p-4">
                        <div class="flex justify-around items-center">
                            <div>
                                <p class="text-black text-3xl">
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
                        </div>
                    </div>    

                    <div class="bg-white rounded-b-xl rounded-t-2xl border-t-8 border-purple-500 w-full p-4">
                        <div class="flex items-center">
                            <div>
                                <p class="text-black text-2xl">
                                    Pergunta atual sobre as opçoes
                                </p>
                                <div class="flex flex-col gap-3 py-2">
                                    <div>
                                        <input type="radio" name="questaoID">
                                        <label for="questaoID">Opção 1</label>
                                    </div>
                                    <div>
                                        <input type="radio" name="questaoID">
                                        <label for="questaoID">Opção 1</label>
                                    </div>
                                    <div>
                                        <input type="radio" name="questaoID">
                                        <label for="questaoID">Opção 1</label>
                                    </div>
                                    <div>
                                        <input type="radio" name="questaoID">
                                        <label for="questaoID">Opção 1</label>
                                    </div>
                                    <div>
                                        <input type="radio" name="questaoID">
                                        <label for="questaoID">Opção 1</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-b-xl rounded-t-2xl border-t-8 border-purple-500 w-full p-4">
                        <div class="flex items-center">
                            <div>
                                <p class="text-black text-2xl">
                                    Pergunta atual sobre as opçoes
                                </p>
                                <div class="flex flex-col gap-3 py-2">
                                    <textarea name="respostaParagrafo" class="p-2 border-black border-2 focus:outline-none focus:border-blue-500"  id="" cols="20" rows="5" placeholder="Digite sua resposta">
                                    </textarea>
                                </div>
                            </div>
                        </div>
                    </div>   

                    <div class="bg-white rounded-b-xl rounded-t-2xl border-t-8 border-purple-500 w-full p-4">
                        <div class="flex items-center">
                            <div>
                                <p class="text-black text-2xl">
                                    Pergunta atual sobre as opçoes
                                </p>
                                <div class="flex flex-col gap-3 py-2">
                                    <div>
                                        <input type="checkbox" name="questaoCheckboxID">
                                        <label for="questaoCheckboxID">Opção 1</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" name="questaoCheckboxID">
                                        <label for="questaoCheckboxID">Opção 1</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" name="questaoCheckboxID">
                                        <label for="questaoCheckboxID">Opção 1</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" name="questaoCheckboxID">
                                        <label for="questaoCheckboxID">Opção 1</label>
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
        }
    },

    methods:{
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

<style>

</style>