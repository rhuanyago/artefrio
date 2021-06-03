<?php
include("Connections/conexao.php");
include("valida.php");
?>
<!-- start: sidebar -->
<div class="tab-navigation collapse">
	<nav>
		<ul class="nav nav-pills">
			<li class="">
				<a class="nav-link" href="home.php">
					<i class="fas fa-home" aria-hidden="true"></i>Dashboard
				</a>    
			</li>
			<li class="dropdown">
				<a class="nav-link dropdown-toggle"><i class="fas fa-users"></i>Cadastros</a>
				<ul class="dropdown-menu">
					<li>
						<a class="nav-link" href="cad_cliente.php">Clientes</a>
					</li>
					<li>
						<a class="nav-link" href="cad_funcionario.php">Funcionários</a>
					</li>
					<li class="dropdown-submenu">
						<a class="nav-link dropdown-toggle" href="#">Representantes</a>
						<ul class="dropdown-menu">
							<li>
								<a class="nav-link" href="cad_vendedor.php">
									Vendedores
								</a>
							</li>
							<li>
								<a class="nav-link" href="cad_borracheiros.php">
									Borracheiros
								</a>
							</li>
						</ul>
					</li>
					<li>
						<a class="nav-link" href="cad_usuario.php">Usuários</a>
					</li>
					<li class="dropdown-submenu">
						<a class="nav-link dropdown-toggle" href="cad_categoria.php">Produtos</a>
						<ul class="dropdown-menu">
							<li>
								<a class="nav-link" href="cad_produtos.php">Produtos</a>
							</li>
							<li>
								<a class="nav-link" href="cad_categoria.php">Categoria</a>
							</li>
						</ul>
					</li>


				</ul>
			</li>
			<li class="dropdown">
				<a class="nav-link dropdown-toggle"><i class="fas fa-dollar-sign" aria-hidden="true"></i></i>Financeiro</a>
				<ul class="dropdown-menu">
					<li>
						<a class="nav-link" href="caixa.php">Caixa</a>
					</li>
					<li>
						<a class="nav-link" href="pagamento_dia.php">Pagamentos</a>
					</li>
					<li>
						<a class="nav-link" href="consulta_pagamento_dia.php">Consultar Pagamentos</a>
					</li>					
										
					
				</ul>
			</li>
			<li class="dropdown">
				<a class="nav-link dropdown-toggle"><i class="fas fa-tasks" aria-hidden="true"></i>Orçamentos</a>
				<ul class="dropdown-menu">
					<li class="dropdown-submenu">
						<a class="nav-link dropdown-toggle">Pedidos</a>
						<ul class="dropdown-menu">
							<li>
								<a class="nav-link" href="nova_comanda.php">
									Novo Pedido
								</a>
							</li>
							<li class="dropdown-submenu">
								<a class="nav-link dropdown-toggle">
									Icons <span class="mega-sub-nav-toggle toggled float-right" data-toggle="collapse" data-target=".mega-sub-nav-sub-menu-1"></span>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a class="nav-link" href="#">
											Elusive
										</a>
									</li>
									<li>
										<a class="nav-link" href="#">
											Font Awesome
										</a>
									</li>
									<li>
										<a class="nav-link" href="#">
											Line Icons
										</a>
									</li>
									<li>
										<a class="nav-link" href="#">
											Meteocons
										</a>
									</li>
								</ul>
							</li>
						</ul>
					</li>
					<li class="dropdown-submenu">
						<a class="nav-link dropdown-toggle">Cotação</a>
						<ul class="dropdown-menu">
							<li>
								<a class="nav-link" href="cotacoes.php">
									Cotações
								</a>
							</li>
						</ul>
					</li>
					
					
					
				</ul>
			</li>
			
			
		</ul>
	</nav>
</div>
<!-- end: sidebar -->