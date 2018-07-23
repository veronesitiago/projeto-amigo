@if(!empty($grupo))
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link {{ (strpos(Request::path(), 'sessao/cadastro')  !== FALSE) ? 'active': '' }}"
          href="/sessao/cadastro/{{ $grupo->id }}">Cadastrar</a>
    </li>
    <li class="nav-item">
      <a class="nav-link {{ (strpos(Request::path(), 'sessao/listar')  !== FALSE) ? 'active': '' }}"
          href="/sessao/listar/{{ $grupo->id }}">Listar</a>
    </li>
  </ul>
@endif
