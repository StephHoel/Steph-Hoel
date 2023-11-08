// import { useState } from 'react'

export default function Contato() {
  // const [name, setName] = useState('')
  // const [email, setEmail] = useState('')
  // const [subject, setSubject] = useState('')
  // const [message, setMessage] = useState('')

  return (
    <div className="p-2 text-left">
      <div className="text-5xl text-center mb-4">Contatos</div>

      <p className="mb-4">
        E-mail: <strong>steph.hoel@gmail.com</strong>
      </p>
      <p>
        LinkedIn:{' '}
        <a
          href="http://www.linkedin.com/in/stephhoel/"
          target="_blank"
          rel="noopener noreferrer"
          className="font-bold underline"
        >
          StephHoel
        </a>
      </p>

      {/* <div className="text-xl text-justify mt-4">
        <form className="w-3/5 mx-auto grid gap-4 text-2xl">
          <div className="items-center grid gap-1">
            <label>Nome</label>
            <input
              type="text"
              placeholder="Nome"
              className="p-2 bg-slate-300 outline-none placeholder:text-gray-600"
              value={name}
              onChange={(e) => setName(e.currentTarget.value)}
            />
          </div>
          <div className="items-center grid gap-1">
            <label>E-mail</label>
            <input
              type="email"
              placeholder="E-mail"
              className="p-2 bg-slate-300 outline-none placeholder:text-gray-600"
              value={email}
              onChange={(e) => setEmail(e.currentTarget.value)}
            />
          </div>
          <div className="items-center grid gap-1">
            <label>Assunto</label>
            <input
              type="text"
              placeholder="Assunto"
              className="p-2 bg-slate-300 outline-none placeholder:text-gray-600"
              value={subject}
              onChange={(e) => setSubject(e.currentTarget.value)}
            />
          </div>
          <div className="items-center grid gap-1">
            <label>Mensagem</label>
            <textarea
              rows={6}
              placeholder="Mensagem"
              className="p-2 bg-slate-300 outline-none placeholder:text-gray-600"
              value={message}
              onChange={(e) => setMessage(e.currentTarget.value)}
            />
          </div>
          <button
            type="submit"
            className="mx-auto w-full py-2 px-6 my-4 rounded bg-gray-400 hover:bg-gray-300 cursor-pointer"
            onClick={(e) => {
              e.preventDefault()

              //   $nome = $_POST['nome'];
              //   $email = $_POST['email'];
              //   $assunto = $_POST['assunto'];
              //   $mensagem = $_POST['mensagem'];

              //   enviaMensagem($conexao, $nome, $email, $assunto, $mensagem);
              //   $mensagem = 'Email enviado com sucesso!!!<br>Em breve entrarei em contato.<br><br>Continue navegando! :D';
            }}
          >
            Enviar
          </button>
        </form>
      </div> */}
    </div>
  )
}
