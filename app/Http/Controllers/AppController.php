<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Usuario;
use App\Models\Contato;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class AppController extends Controller
{
    public function sobre(){
        $frame = "(Laravel)";
        $vantagens = ["Sintaxe simples", "Sintaxe concisa", "Sistema modular"];
        return view('sobre', ['frm'=>$frame, 'vtg'=>$vantagens]);
    }

    public function home(){
        $cards = [
            [
                'imagem' => 'https://static-00.iconduck.com/assets.00/laravel-icon-497x512-uwybstke.png',
                'nome' => 'Nuvem',
                'texto' => 'Plataforma de infraestrutura totalmente gerenciada para implantação e hospedagem PHP.',
                'preco' => 'A partir de US$ 0,00/mês'
            ],
            [
                'imagem' => 'https://static-00.iconduck.com/assets.00/laravel-icon-249x256-4gdjrenn.png',
                'nome' => 'Forja',
                'texto' => 'Gerenciamento de servidores para aplicativos no DigitalOcean, Vultr, Amazon, Hetzner e muito mais',
                'preco' => 'A partir de US$ 12,00/mês'
            ],
            [
                'imagem' => 'https://static-00.iconduck.com/assets.00/laravel-icon-497x512-uwybstke.png',
                'nome' => 'Vigília Noturna',
                'texto' => 'Monitoramento e insights incomparáveis sobre o desempenho do seu aplicativo Laravel.',
                'preco' => 'Preços em breve'
            ],
            [
                'imagem' => 'https://static-00.iconduck.com/assets.00/laravel-icon-249x256-4gdjrenn.png',
                'nome' => 'Nova',
                'texto' => 'A maneira mais simples e rápida de criar painéis de administração prontos para produção.',
                'preco' => 'A partir de $ 99,00'
            ]
        ];

        return view('home', ['crd'=>$cards]);
         
    }

    public function produtos(){
        $produtos = Produto::all();
        return view('produtos', ['prods' => $produtos]);
    }

    public function contato(){
        return view('contato');
    }
    public function salvarContato(Request $request)
    {
        Contato::create($request->all());
        return redirect('/contato')->with('success', 'Formulário enviado com sucesso!');
    }
    public function frmproduto(){
        return view('frmproduto');
    }

    public function addproduto(Request $request){
        $prod = new Produto;

        $prod->nome = $request->nome;
        $prod->preco = $request->preco;
        $prod->quantidade = $request->quantidade;

        if($request->hasFile('imagem')){
            $path = $request->file('imagem')->store('imagens','public');
            $prod->imagem = $path;
        }

        $prod->save();

        return redirect('produtos');
    }

    public function frmusuario(){
        return view('frmusuario');
    }

    

    public function addusuario(Request $request){
        $usuario = new Usuario();
        $usuario->nome = $request->fnome;
        $usuario->email = $request->femail;
        $usuario->senha = Hash::make($request->fsenha);
        $usuario->save();
        return redirect('sobre');
    }

    public function usuarios(){
        $usuarios = Usuario::all();
        return view('usuarios',['users'=>$usuarios]);
    }

    public function frmeditarusuario($id){
        $usuario = Usuario::findOrFail($id);
        return view('frmeditarusuario',['user'=>$usuario]);
    }

    public function atualizarusuario(Request $request, $id){
        $usuario = Usuario::findOrFail($id);

        $dados = [
            'nome' => $request->fnome,
            'email' => $request->femail
        ];

        if(!empty($request->fsenha)){
            $dados['senha'] = Hash::make($request->fsenha);
        }
        
        $usuario->update($dados);

        return redirect('usuarios');
    }

    public function excluirusuario($id){
        $usuario = usuario::findOrFail($id);
        $usuario->delete();
        return redirect('usuarios');
    }

    public function frmlogin(){
        return view('frmlogin');
    }

    public function logar(Request $request)
    {
        $usuario = Usuario::where('email', $request->email)->first();

        if ($usuario && Hash::check($request->senha, $usuario->senha)) {
            // Login bem-sucedido
            // Exemplo: salvar dados na sessão
            session(['usuario_id' => $usuario->id, 'usuario_nome' => $usuario->nome]);
            return redirect('home')->with('success', 'Login realizado com sucesso!');
        } else {
            // Falha no login
            return redirect('frmlogin')->with('error', 'E-mail ou senha inválidos.');
        }
    }

    public function dashboard() {
        if (!session()->has('usuario_id')) {
            return redirect('/frmlogin');
        }
        return view('dashboard');
    }

    public function logout() {
        Session::flush();
        return redirect('/');
    }

    public function salvarUsuario(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios,email',
            'senha' => 'required|min:6',
        ]);

        Usuario::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'senha' => bcrypt($request->senha),
        ]);

        return redirect('frmlogin')->with('success', 'Cadastro realizado com sucesso! Faça login.');
    }

    public function listaContatos()
    {
        $contatos = Contato::all();
        return view('listaContatos', ['contatos' => $contatos]);
    }

    public function listaProdutos()
    {
        $produtos = Produto::all();
        return view('listaProdutos', ['produtos' => $produtos]);
    }

    public function frmeditarproduto($id)
    {
        $produto = Produto::findOrFail($id);
        return view('frmeditarproduto', ['produto' => $produto]);
    }

    public function atualizarproduto(Request $request, $id)
    {
        $produto = Produto::findOrFail($id);

        $dados = [
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'preco' => $request->preco,
        ];

        if ($request->hasFile('imagem')) {
            $path = $request->file('imagem')->store('imagens', 'public');
            $dados['imagem'] = $path;
        }

        $produto->update($dados);

        return redirect()->route('produtos')->with('success', 'Produto atualizado com sucesso!');
    }

    public function excluirproduto($id)
    {
        $produto = Produto::findOrFail($id);
        $produto->delete();
        return redirect()->route('produtos')->with('success', 'Produto excluído com sucesso!');
    }
    public function excluircontato($id)
    {
        $contato = Contato::findOrFail($id);
        $contato->delete();
        return redirect()->route('ListaContatos')->with('success', 'Contato excluído com sucesso!');
    }
}