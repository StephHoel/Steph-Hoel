export default function Contato() {
  // $status = $_POST['env'];
  // if ($status == "enviado"){
  //   $nome = $_POST['nome'];
  //   $email = $_POST['email'];
  //   $assunto = $_POST['assunto'];
  //   $mensagem = $_POST['mensagem'];

  //   enviaMensagem($conexao, $nome, $email, $assunto, $mensagem);
  //   $mensagem = 'Email enviado com sucesso!!!<br>Em breve entrarei em contato.<br><br>Continue navegando! :D';
  //   salvaLog("$nome: Email enviado", "contato.php");
  // }

  return (
    <div>
      <div className="text-5xl text-center">Contato</div>
      {/* <?php //videoYoutube($conexao, 0, 15); ?> */}

      <div className="text-xl text-justify normal-case mt-4">
        <form
          action=""
          method="post"
          className="text-center w-3/4 mx-auto grid gap-4 text-2xl"
          name="envia"
        >
          <div className="justify-center items-center gap-4 grid-2">
            <label className="min-w-[65px]">Nome</label>
            <input
              name="nome"
              type="text"
              size={55}
              placeholder="Nome"
              className="p-1 placeholder:text-gray-400"
              value=""
            />
          </div>
          <div className="justify-center items-center gap-4 grid-2">
            <label className="min-w-[65px]">E-mail</label>
            <input
              name="email"
              type="email"
              size={55}
              placeholder="E-mail"
              className="p-1 placeholder:text-gray-400"
              value=""
            />
          </div>
          <div className="justify-center items-center gap-4 grid-2">
            <label className="min-w-[65px]">Assunto</label>
            <input
              name="assunto"
              type="text"
              size={55}
              placeholder="Assunto"
              className="p-1 placeholder:text-gray-400"
              value=""
            />
          </div>
          <div className="justify-center items-center gap-4 grid-2">
            <label className="min-w-[65px]">Mensagem</label>
            <textarea
              name="mensagem"
              rows={6}
              placeholder="Mensagem"
              className="p-1 placeholder:text-gray-400"
              value=""
            />
          </div>
          <input type="hidden" name="env" value="enviado" />
          <input
            type="submit"
            className="mx-auto border py-2 px-6 rounded bg-gray-400 hover:bg-gray-300 cursor-pointer"
            value="Enviar"
          />
        </form>
      </div>
    </div>
  )
}
