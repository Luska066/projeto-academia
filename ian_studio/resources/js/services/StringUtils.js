export default class  StringUtils {

    formatPriceBRL(price){
        return price.toLocaleString('pt-BR', {style: 'currency', currency: 'BRL'});
    }

    unmaskMoneyBRL(valor) {
        if (!valor) return 0; // Retorna 0 se o valor for nulo ou indefinido

        const numero = valor
            .replace(/\s/g, '')          // Remove espaços em branco
            .replace('R$', '')           // Remove o símbolo de R$
            .replace(/\./g, '')          // Remove TODOS os pontos (separadores de milhares)
            .replace(',', '.');          // Substitui a vírgula decimal por ponto

        return parseFloat(numero) || 0; // Converte para número ou retorna 0 se inválido
    }

}
