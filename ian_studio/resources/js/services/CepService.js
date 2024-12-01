export default class CepService{
     viaCep(cep){
        return axios.get(`https://viacep.com.br/ws/${cep}/json`)
    }
}
