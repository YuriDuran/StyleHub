<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
        <a class="nav-link collapsed" href="{% url 'prinadmin' %}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li class="nav-heading">Paginas</li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="pag_principal_a.php?id=<?php echo htmlspecialchars($id); ?>">
          <i class="bi bi-house-door"></i><span>Pagina Inicio</span></i>
        </a>
      </li>
    
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Prendas</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="registro-prenda.php?id=<?php echo htmlspecialchars($id); ?>">
              <i class="bi bi-circle"></i><span>Registrar</span>
            </a>
          </li>
          <li>
            <a href="{% url 'aprobar_solicitud' %}">
              <i class="bi bi-circle"></i><span>Solicitud</span>
            </a>
          </li>
          <li>
            <a href="{% url 'editar_ase' %}">
              <i class="bi bi-circle"></i><span>Editar Prenda</span>
            </a>
          </li>
        </ul>
      </li>
    </ul>
</aside>