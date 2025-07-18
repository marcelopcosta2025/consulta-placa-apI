# API de Consulta de Placa

Este projeto fornece uma API em PHP para consultar informações de veículos a partir da placa utilizando o site [anycar.com.br](https://anycar.com.br/consulta-placa/placa).

## **Funcionalidades**
- Consulta marca, modelo, cor e ano do veículo.
- Retorno em formato JSON.
- Exemplo de integração com formulário HTML e JavaScript.

## **Arquivos**
- `consulta_placa.php`: Endpoint PHP para realizar a consulta.
- `index.html`: Exemplo de formulário que consome a API.
- `README.md`: Documentação do projeto.

## **Como Usar**
1. Faça upload dos arquivos em um servidor web com PHP habilitado.
2. Acesse o `index.html` no navegador.
3. Digite a placa do veículo e clique em **Consultar**.
4. Os campos de **Marca**, **Modelo**, **Cor** e **Ano** serão preenchidos automaticamente.

## **Exemplo de Endpoint**
```
GET consulta_placa.php?placa=ABC1234
```
Resposta:
```json
{
  "placa": "ABC1234",
  "marca": "FIAT",
  "modelo": "UNO MILLE",
  "cor": "VERMELHO",
  "ano": "2010/2011"
}
```

## **Requisitos**
- PHP 7+ com `cURL` habilitado.
- Servidor web (Apache/Nginx).

---
**Autor:** Marcelo Costa  
