import swal from "sweetalert2";

class Flash {
	info(text, title = "Great") {
		swal({
			type: "info",
			text: text,
			title
		});
	}

	success(text, title = "Great") {
		return swal(
			this.props({
				type: "success",
				text: text,
				title
			})
		);
	}
	error(text) {
		return swal(
			this.props({
				type: "error",
				text
			})
		);
	}
	html(html, title = "Great", type = "info") {
		return swal(
			this.props({
				type,
				title,
				html
			})
		);
	}

	confirm(text, title = "Are you sure?") {
		return new Promise((resolve = () => {}, reject = () => {}) => {
			swal(
				this.props({
					text,
					title,
					type: "warning",
					showCancelButton: true
				})
			)
				.then(result => (result.value ? resolve() : null))
				.catch(error => reject(error));
		});
	}
	props(aditions) {
		return {
			type: "info",
			confirmButtonText: "Okay",
			cancelButtonText: "No, cancel!",
			confirmButtonClass: "btn btn-primary",
			cancelButtonClass: "btn btn-danger",
			buttonsStyling: false,
			...aditions
		};
	}
	errors(errors) {
		let message = "<ul class='list-group'>";
		for (let name in errors) {
			errors[name].forEach(error => {
				message += `<li class='list-group-item'>${error}</li>`;
			});
		}
		message += "</ul>";
		console.log(errors);

		this.html(message, "Opps", "error");
	}

	loading(func) {
		return swal({
			title: "loading",
			onOpen: () => {
				swal.showLoading();
				func();
			}
		});
	}
}

export { Flash };
