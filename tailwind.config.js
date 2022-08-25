module.exports = {
	content: ["./**/*.php"],
	mode: "jit", // Just-In-Time Compiler
	purge: ["./**/*.php"],
	darkMode: false, // or 'media' or 'class'
	theme: {
		extend: {
			minWidth: {
				72: "18rem",
			},
		},
	},
	variants: {
		extend: {},
	},
	plugins: [],
};
