<div class="content-body">
	<!-- row -->
	<div class="container-fluid">
		<div class="form-head d-flex mb-3 mb-md-5 align-items-start">
			<div class="mr-auto d-none d-lg-block">
				<h3 class="text-primary font-w600">Welcome
					<?= "{$session->get('admin_full_name')}"; ?>!
				</h3>
				<p class="mb-0">Your acting as:
					<?= $session->get('admin_role_name') ?>
				</p>
			</div>
		</div>
		<div class="row">
			<div class="col-xl-12 col-xxl-12">

				<?php if ($request->getGet('error')): ?>
					<div class="alert alert-danger" role="alert">
						<?= $request->getGet('error') ?>
					</div>
				<?php endif ?>

				<?php if ($request->getGet('success')): ?>
					<div class="alert alert-success" role="alert">
						<?= $request->getGet('success') ?>
					</div>
				<?php endif ?>

			</div>

			<div class="col-xl-12 col-xxl-12">

				<div class="row">
					<div class="col-xl-6 col-xxl-6 col-lg-6 col-md-6">
						<div class="card">
							<div class="card-header border-0 pb-0">
								<h4 class="card-title">Admins</h4>
							</div>
							<div class="card-body pb-0">
								<div class="recovered-chart-deta d-flex">
									<div class="col">
										<span class="bg-success"></span>
										<div>
											<p>Admins</p>
											<h5>
												<?= number_format($total_admins ?? 0) ?>
											</h5>
										</div>
									</div>
									<div class="col">
										<span class="bg-danger"></span>
										<div>
											<p>Roles</p>
											<h5>
												<?= number_format($total_roles ?? 0) ?>
											</h5>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-6 col-xxl-6 col-lg-6 col-md-6">
						<div class="card">
							<div class="card-header border-0 pb-0">
								<h4 class="card-title">Floor Categories</h4>
							</div>
							<div class="card-body pb-0">
								<div class="recovered-chart-deta d-flex">
									<div class="col">
										<span class="bg-success"></span>
										<div>
											<p>Active</p>
											<h5>
												<?= number_format($active_categories ?? 0) ?>
											</h5>
										</div>
									</div>
									<div class="col">
										<span class="bg-danger"></span>
										<div>
											<p>Inactive</p>
											<h5>
												<?= number_format($inactive_categories ?? 0) ?>
											</h5>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-6 col-xxl-6 col-lg-6 col-md-6">
						<div class="card">
							<div class="card-header border-0 pb-0">
								<h4 class="card-title">Floor Categories Images</h4>
							</div>
							<div class="card-body pb-0">
								<div class="recovered-chart-deta d-flex">
									<div class="col">
										<span class="bg-success"></span>
										<div>
											<p>Total</p>
											<h5>
												<?= number_format($floor_images ?? 0) ?>
											</h5>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>