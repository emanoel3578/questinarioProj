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
                                    {{dataArrMultipla[0].titulo}}
                                </p>
                                <p class="text-black text-sm">
                                    {{dataArrMultipla[0].descricao}}
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
                                     {{dataArrMultipla[0].created_at.split("T")[0].split("-").reverse().join("/")}}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-b-xl rounded-t-2xl border-t-8 border-purple-500 w-full p-4">
                        <div class="flex items-center w-full">
                            <div class="flex flex-col justify-between w-full">
                                <div class="flex">
                                    <div class="">
                                        <label for="nomeCompleto">Nome completo:</label>
                                        <input v-model="nomeCompleto" type="text" class="focus:border-black w-1/2 focus:outline-none border-b-2 py-2 px-3 text-grey-darkest" name="nomeCompleto" id="">
                                    </div>

                                    <div class="">
                                        <label for="nomeCompleto">Matricula:</label>
                                        <input v-model="matricula" type="text" class="focus:border-black w-1/2 focus:outline-none border-b-2 py-2 px-3 text-grey-darkest" name="nomeCompleto" id="">
                                    </div>
                                </div>
                            </div>
                                
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-b-xl rounded-t-2xl border-t-8 border-purple-500 w-full p-4">
                        <ul>
                            <li class="font-semibold text-black">
                                Para completar com sucesso o seu questionario, preencha cada questão com sua resposta e clique no botão "Responder",
                                ao final de cada questão. Caso o contrário sua resposta não será aceita.
                            </li>
                        </ul>
                    </div>

                    <div v-if="doneFormulario">
                        <div class="bg-white rounded-b-xl rounded-t-2xl border-t-8 border-purple-500 w-full p-4">
                            <div class="text-3xl text-center text-green-600">
                                Parabéns você completou o formulario
                            </div>
                        </div>
                    </div>
                    
                    <div v-else>
                        <div v-for="data in dataArrMultipla" :key="data.id" class="bg-white rounded-b-xl rounded-t-2xl border-t-8 border-purple-500 w-full p-4">
                            <div class="flex items-center">
                                <div>
                                    <p class="text-black text-2xl pergunta">
                                        {{data.pergunta}}
                                    </p>
                                    <div class="flex flex-col gap-3 py-2 respostaMultipla">
                                        <div v-if="data.opcao1">
                                            <input type="radio" :value="data.opcao1" name="questaoID">
                                            <label for="questaoID1">{{data.opcao1}}</label>
                                        </div>
                                        <div v-if="data.opcao2">
                                            <input type="radio" :value="data.opcao2" name="questaoID">
                                            <label for="questaoID2">{{data.opcao2}}</label>
                                        </div>
                                        <div v-if="data.opcao3">
                                            <input type="radio" :value="data.opcao3" name="questaoID">
                                            <label for="questaoID3">{{data.opcao3}}</label>
                                        </div>
                                        <div v-if="data.opcao4">
                                            <input type="radio" :value="data.opcao4" name="questaoID">
                                            <label for="questaoID4">{{data.opcao4}}</label>
                                        </div>
                                        <div v-if="data.opcao5">
                                            <input type="radio" :value="data.opcao5" name="questaoID">
                                            <label for="questaoID5">{{data.opcao5}}</label>
                                        </div>
                                        <div v-if="data.opcao6">
                                            <input type="radio" :value="data.opcao6" name="questaoID">
                                            <label for="questaoID6">{{data.opcao6}}</label>
                                        </div>
                                        <div v-if="data.opcao7">
                                            <input type="radio" :value="data.opcao7" name="questaoID">
                                            <label for="questaoID7">{{data.opcao7}}</label>
                                        </div>
                                        <div v-if="data.opcao8">
                                            <input type="radio" :value="data.opcao8" name="questaoID">
                                            <label for="questaoID8">{{data.opcao8}}</label>
                                        </div>
                                        <div v-if="data.opcao9">
                                            <input type="radio" :value="data.opcao9" name="questaoID">
                                            <label for="questaoID9">{{data.opcao9}}</label>
                                        </div>
                                        <div v-if="data.opcao10">
                                            <input type="radio" :value="data.opcao10" name="questaoID">
                                            <label for="questaoID10">{{data.opcao10}}</label>
                                        </div>
                                    </div>


                                    <div class="flex justify-end">
                                        <button @click="createTotalRespostas" class="bg-blue-500 rounded-3xl p-2 text-white">
                                            Responder !
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div v-for="data in dataArrParagrafo" :key="data.id" class="bg-white rounded-b-xl rounded-t-2xl border-t-8 border-purple-500 w-full p-4">
                            <div class="flex items-center respostaParagrafo">
                                <div>
                                    <p class="text-black text-2xl ">
                                        {{data.pergunta}}
                                    </p>
                                    <div class="flex flex-col gap-3 py-2">
                                        <textarea name="respostaParagrafo" class="p-2 border-black border-2 focus:outline-none focus:border-blue-500"  id="" cols="20" rows="5" placeholder="Digite sua resposta">
                                        </textarea>
                                    </div>

                                    <div class="flex justify-end">
                                        <button @click="createTotalRespostas" id="respostaParagrafo" class="bg-blue-500 rounded-3xl p-2 text-white">
                                            Responder !
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>   

                        <div v-for="data in dataArrCheckbox" :key="data.id" class="bg-white rounded-b-xl rounded-t-2xl border-t-8 border-purple-500 w-full p-4">
                            <div class="flex items-center">
                                <div>
                                    <p class="text-black text-2xl pergunta">
                                        {{data.pergunta}}
                                    </p>
                                    <div class="flex flex-col gap-3 py-2 respostaCheckbox">
                                        <div v-if="data.opcao1" >
                                            <input class="respostaCheckbox" :value="data.opcao1" type="checkbox" name="questaoCheckboxID">
                                            <label for="questaoCheckboxID">{{data.opcao1}}</label>
                                        </div>
                                        <div v-if="data.opcao2">
                                            <input class="respostaCheckbox" :value="data.opcao2"  type="checkbox" name="questaoCheckboxID">
                                            <label for="questaoCheckboxID">{{data.opcao2}}</label>
                                        </div>
                                        <div v-if="data.opcao3">
                                            <input class="respostaCheckbox" :value="data.opcao3"  type="checkbox" name="questaoCheckboxID">
                                            <label for="questaoCheckboxID">{{data.opcao3}}</label>
                                        </div>
                                        <div v-if="data.opcao4">
                                            <input class="respostaCheckbox" :value="data.opcao4"  type="checkbox" name="questaoCheckboxID">
                                            <label for="questaoCheckboxID">{{data.opcao4}}</label>
                                        </div>
                                        <div v-if="data.opcao5">
                                            <input class="respostaCheckbox" :value="data.opcao5"  type="checkbox" name="questaoCheckboxID">
                                            <label for="questaoCheckboxID">{{data.opcao5}}</label>
                                        </div>
                                        <div v-if="data.opcao6">
                                            <input class="respostaCheckbox" :value="data.opcao6"  type="checkbox" name="questaoCheckboxID">
                                            <label for="questaoCheckboxID">{{data.opcao6}}</label>
                                        </div>
                                        <div v-if="data.opcao7">
                                            <input class="respostaCheckbox" :value="data.opcao7"  type="checkbox" name="questaoCheckboxID">
                                            <label for="questaoCheckboxID">{{data.opcao7}}</label>
                                        </div>
                                        <div v-if="data.opcao8">
                                            <input class="respostaCheckbox"  :value="data.opcao8" type="checkbox" name="questaoCheckboxID">
                                            <label for="questaoCheckboxID">{{data.opcao8}}</label>
                                        </div>
                                        <div v-if="data.opcao9">
                                            <input class="respostaCheckbox" :value="data.opcao9"  type="checkbox" name="questaoCheckboxID">
                                            <label for="questaoCheckboxID">{{data.opcao9}}</label>
                                        </div>
                                        <div v-if="data.opcao10">
                                            <input class="respostaCheckbox" :value="data.opcao10"  type="checkbox" name="questaoCheckboxID">
                                            <label for="questaoCheckboxID">{{data.opcao10}}</label>
                                        </div>
                                    </div>

                                    <div class="flex justify-end">
                                        <button @click="createTotalRespostas" class="bg-blue-500 rounded-3xl p-2 text-white">
                                            Responder !
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>  

                        <div v-show="formularioReady" class="bg-white rounded-b-xl rounded-t-2xl border-t-8 border-purple-500 w-full p-4">
                            <div class="flex justify-center mt-2">
                                <button @click="sendResposta" class="bg-blue-500 rounded-3xl p-2 text-white">
                                    Finalizar formulario !
                                </button>
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
            dataArrMultipla:[],
            dataArrParagrafo:[],
            dataArrCheckbox:[],
            formularioReady:false,
            totalRespostas:[],
            matricula:"",
            nomeCompleto:"",
            formData:{
                email:'emanoel357@gmail.com',
                password: 'manel123'
            },
            doneFormulario:false
        }
    },

    mounted() {
        axios.get('/sanctum/csrf-cookie').then(response => {
            axios.post("/login", this.formData).then(response => {})
            var query = window.location.search.substring(1).replace("%20", " ").replace("form=", "");
            axios.get('/api/questions/form/' + query).then(res=> {
                res.data.map((element)=>{
                    if (element.tipodepergunta == "multipla") {
                        this.dataArrMultipla.push(element)
                    }

                    if (element.tipodepergunta == "paragrafo") {
                        this.dataArrParagrafo.push(element)
                    }

                    if (element.tipodepergunta == "checkbox") {
                        this.dataArrCheckbox.push(element)
                    }
                })
            })
        })
    },

    methods:{

        createTotalRespostas(event) {
            var createResposta = {
                nome: this.nomeCompleto,
                matricula: this.matricula,
                nomeFormulario:'',
                titulo:'',
                descricao:'',
                pergunta:'',
                ndeperguntas:'1',
                tipodepergunta:'',
                resposta1:"",
            }

            createResposta.nomeFormulario = this.dataArrMultipla[0].titulo
            createResposta.titulo = this.dataArrMultipla[0].titulo
            createResposta.descricao = this.dataArrMultipla[0].descricao

            if(event.path[3].getElementsByClassName("respostaMultipla").length > 0) {
                
                var ele = event.path[3].getElementsByTagName('input')
                for(var i = 0; i < ele.length; i++) {
                    if(ele[i].type="radio") {
                        if(ele[i].checked){
                            createResposta.resposta1 = ele[i].value
                        }
                    }
                }

                if (createResposta.resposta1 == "") {
                    alert("Por favor marque uma opção")
                }
                createResposta.tipodepergunta = "multipla"
                createResposta.pergunta = event.path[3].getElementsByClassName("pergunta")[0].outerText;

            }
            if(event.path[3].getElementsByClassName("respostaCheckbox").length > 0) {
                createResposta.tipodepergunta = "checkbox"
                var checkboxes = event.path[3].querySelectorAll('.respostaCheckbox:checked')

                for (var i = 0; i < checkboxes.length; i++) {
                    createResposta[`resposta${i+1}`] = checkboxes[i].value
                }
                createResposta.pergunta = event.path[3].getElementsByClassName("pergunta")[0].outerText;

                console.log(createResposta.resposta1)

            }
            if(event.srcElement.id == "respostaParagrafo") {
                createResposta.tipodepergunta = "paragrafo"
                createResposta.pergunta = event.path[2].firstChild.innerText
                createResposta.resposta1 = event.path[3].getElementsByTagName("textarea")[0].value

            }

            if(this.matricula != "" && this.nomeCompleto != "" && createResposta.resposta1 != "") {
                if (this.totalRespostas.length < 1) {
                    this.totalRespostas.push(createResposta)

                    event.target.className = "bg-green-500 rounded-3xl p-2 text-white cursor-default"
                    event.target.innerHTML = "OK !"
                }else{
                    var insertedAlready = false
                    this.totalRespostas.map((element)=> {
                        if (element.pergunta == createResposta.pergunta) {
                            alert("Resposta já inserida")
                            insertedAlready = true
                        }
                    })
    
                    if(insertedAlready == false) {
                        this.totalRespostas.push(createResposta)
                        event.target.className = "bg-green-500 rounded-3xl p-2 text-white cursor-default"
                        event.target.innerHTML = "OK !"
                    }
                }
            }else {
                alert("Complete os campos nome completo e Matricula")
            }

            var totalquestoes = this.dataArrMultipla.length + this.dataArrParagrafo.length + this.dataArrCheckbox.length
            
            if(this.totalRespostas.length == totalquestoes) {
                this.formularioReady = true
                alert("Você já pode finalizar seu questionario")
            }

            // console.log(this.totalRespostas)

        },

        sendResposta () {
            let promises = [];
            let users = [];
            // console.log(this.totalRespostas)
            if (this.totalRespostas.length >= 1) {
                for (var i = 0; i < this.totalRespostas.length; i++) {
                    promises.push(
                        axios.post('api/respostas', this.totalRespostas[i]).then(response => {
                            console.log(response)
                            users.push(response)
                        })
                    )
                }

                Promise.all(promises).then(() => {
                    this.doneFormulario = true
                });
            }else {
                alert("Você não salvou nenhum pergunta nesse formulario para o envio.Por favor preencha abaixo")
            }
        }
    }

}
</script>

<style>

</style>