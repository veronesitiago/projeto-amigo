@if(!empty($grupo))
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link {{ (strpos(Request::path(), 'grupo/exibir')  !== FALSE) ? 'active': '' }}"
          href="/grupo/exibir/{{ $grupo->id }}">Dados</a>
    </li>
    <li class="nav-item">
      <a class="nav-link {{ (strpos(Request::path(), 'grupo/listar-participantes')  !== FALSE) ? 'active': '' }}"
          href="/grupo/listar-participantes/{{ $grupo->id }}">Participantes</a>
    </li>
    <li class="nav-item">
      <a class="nav-link {{ (strpos(Request::path(), 'grupo/listar-sessoes')  !== FALSE) ? 'active': '' }}"
          href="/grupo/listar-sessoes/{{ $grupo->id }}">Sessões</a>
    </li>
  </ul>
@endif
