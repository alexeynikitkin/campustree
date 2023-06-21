/*
Event creation
 */
const leafCreationValidation = () => {
	const leafCreationForm = document.querySelector('#leaf-creation-form');

	if (!!leafCreationForm) {
		const leafCreationValid = new Pristine(leafCreationForm, {
			classTo: 'input-container',
			errorClass: 'has-error',
		});

		leafCreationForm.addEventListener('submit', (e) => {
			if (!leafCreationValid.validate()) {
				e.preventDefault();
			}
		});
	}
};

/*
Login
 */
const loginValidation = () => {
	const form = document.querySelector('#sign-in-form');

	if (!!form) {
		const formValid = new Pristine(form, {
			classTo: 'input-container',
			errorClass: 'has-error',
		});

		form.addEventListener('submit', (e) => {
			if (!formValid.validate()) {
				e.preventDefault();
			}
		});
	}
};

/*
Personal tree
 */
const personalTreeValidation = () => {
	const personalTreeForm = document.querySelector('#personal-tree-form');

	if (!!personalTreeForm) {
		const personalTreeValid = new Pristine(personalTreeForm, {
			classTo: 'input-container',
			errorClass: 'has-error',
		});

		personalTreeForm.addEventListener('submit', (e) => {
			if (!personalTreeValid.validate()) {
				e.preventDefault();
			}
		});
	}
};


