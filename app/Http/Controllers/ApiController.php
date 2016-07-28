<?php

namespace App\Http\Controllers;

use App\Sintegra;
use Illuminate\Http\Request;

use App\Http\Requests;

class ApiController extends Controller
{

    private $sintegra;

    public function __construct(Sintegra $sintegra)
    {
        $this->sintegra = $sintegra;
    }

    public function pesquisar(Request $request){

        $data = [
            'num_cnpj' => $request->cnpj,
            'num_ie' => '',
            'botao' => 'Consultar'
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://www.sintegra.es.gov.br/resultado.php");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

        $html = curl_exec($ch);

        $json = $this->limpar($html);

        $this->gravar($json,$request->cnpj);

        $dados = json_decode($json);

        return view('home', compact('dados'));

    }

    public function consultar(){

        $dados = $this->sintegra->paginate(5);

        return view('consultar', compact('dados'));
    }

    public function remover($id){
        $this->sintegra->find($id)->delete();
        return redirect()->route('consultar');
    }

    public function limpar($html){

        preg_match_all('/<div id="conteudo"[^>]*>(.*?)<\\/div>/si', $html, $out);

        $html = $out[0][0];

        preg_match_all("/<table width=\"100%\" border=\"0\" cellspacing=\"[12]\" cellpadding=\"[12]\">[^>]*>(.*?)<\\/table>/si", $html, $out);

        if (empty($out[0][0])) {
            return '{"sintegra_es": "CNPJ não existe em nossa base de dados"}';
        }

        preg_match_all("/<td class=\"valor\"[^>]*>(.*?)<\\/td>/si", $out[0][0], $val);
        $indentificacao = str_replace('&nbsp;','', array_map("strip_tags", $val[0]));

        preg_match_all("/<td (class=\"valor\"|width=\"30%\")[^>]*>(.*?)<\\/td>/si", $out[0][1], $val);
        $endereco = str_replace('&nbsp;','', array_map("strip_tags", $val[0]));

        preg_match_all("/<td class=\"valor\"[^>]*>(.*?)<\\/td>/si", $out[0][2], $val);
        $info = str_replace('&nbsp;','', array_map("strip_tags", $val[0]));

        return $this->json($indentificacao,$endereco,$info);

    }

    public function json($indentificacao,$endereco,$info){

        $json = [
            'cnpj' => $indentificacao[0],
            'ie' => $indentificacao[1],
            'rsocial' => $indentificacao[2],
            'logradouro' => $endereco[0],
            'numero' => $endereco[1],
            'complemento' => $endereco[2],
            'bairro' => $endereco[3],
            'municipio' => $endereco[4],
            'uf' => $endereco[5],
            'cep' => $endereco[6],
            'telefone' => $endereco[7],
            'atividadeEco' => $info[0],
            'dtinicio' => $info[1],
            'situacao' => $info[2],
            'dtsituacao' => $info[3],

        ];

        $json = json_encode($json);

        return $json;

    }

    public function gravar($dados,$cnpj){

        // $UserId = Auth::user()->id;

        $this->sintegra->create(["idusuario"=>1,"cnpj"=>$cnpj,"resultado_json"=>$dados]);

    }
}
