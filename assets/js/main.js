document.addEventListener("DOMContentLoaded", function () {

    // --- Login Modal Functionality ---
    const modal = document.getElementById("loginModal");
    const loginBtn = document.getElementById("loginBtn");
    const closeBtn = document.querySelector("#loginModal .close-btn");
    const registerLink = document.getElementById("registerLink");

    if (loginBtn) {
        loginBtn.onclick = function (e) {
            e.preventDefault();
            modal.style.display = "block";
        }
    }
    
    if (closeBtn) {
        closeBtn.onclick = function () {
            modal.style.display = "none";
        }
    }

    // --- Form Submission & Register Link ---
    const loginForm = document.getElementById("loginForm");
    if (loginForm) {
        loginForm.addEventListener("submit", function (e) {
            e.preventDefault();
            const username = document.getElementById("username").value;
            const password = document.getElementById("password").value;

            // This is a front-end DEMO only.
            if (username === "admin" && password === "himmi123") {
                alert("Login berhasil! (DEMO)\nAnda akan diarahkan ke dashboard admin.");
                modal.style.display = "none";
            } else {
                alert("Username atau password salah!");
            }
        });
    }

    if(registerLink) {
        registerLink.addEventListener("click", function(e) {
            e.preventDefault();
            alert("Fitur pendaftaran akan terhubung ke sistem back-end.");
        });
    }
    
    // --- Close modal when clicking outside of it ---
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    // --- Animate on Scroll Functionality ---
    const scrollObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.1
    });

    document.querySelectorAll('.animate-on-scroll').forEach(element => {
        scrollObserver.observe(element);
    });

});