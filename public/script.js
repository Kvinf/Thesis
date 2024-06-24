document.addEventListener('DOMContentLoaded', function () {


    var buttons = document.querySelectorAll(".autoResizeTextarea");

    buttons.forEach(function (button) {
        button.addEventListener('input', function () {
            this.style.height = 'auto';
            this.style.height = (this.scrollHeight) + 'px';
        });
        button.dispatchEvent(new Event('input'));
    });

    var dropdownbox = document.querySelectorAll('.drop-down-box');
    dropdownbox.forEach(function (button) {
        button.addEventListener('click', function () {

            var dropDownValueGroup = this.parentElement.querySelector(
                '.drop-down-value-group');

            if (dropDownValueGroup) {
                dropDownValueGroup.classList.toggle('show');
                dropDownValueGroup.classList.toggle('hide');

            }

        });
    });
    var dropdownItems = document.querySelectorAll('.drop-down-item');

    dropdownItems.forEach(function (item) {
        item.addEventListener('click', function () {
            var allItems = this.parentElement.querySelectorAll('.drop-down-item');
            allItems.forEach(function (innerItem) {
                innerItem.classList.remove('selected');
            });
            this.classList.add('selected');

            var dropDownBox = this.closest('.form-drop-box');
            var dropDownInput = dropDownBox.querySelector('.drop-down-input');
            dropDownInput.querySelector('.drop-down-text').textContent = this.textContent;

            var hiddenInput = dropDownBox.querySelector('.drop-down-value');

            hiddenInput.value = this.getAttribute('value');


            this.parentElement.classList.toggle('show');
            this.parentElement.classList.toggle('hide');

        });
    });

    document.getElementById("menu-icon").addEventListener("click", function () {

        var navbar = document.getElementById('nav-bar');
        var closeMenu = document.getElementById('close-menu');
        navbar.classList.toggle('expanded');
        closeMenu.style.zIndex = 50;

    })

    document.getElementById("close-icon").addEventListener("click", function () {

        var navbar = document.getElementById('nav-bar');
        navbar.classList.remove('expanded');
        var closeMenu = document.getElementById('close-menu');
        closeMenu.style.zIndex = -999;

    })

    document.getElementById("close-menu").addEventListener("click", function () {

        var navbar = document.getElementById('nav-bar');
        navbar.classList.remove('expanded');
        this.style.zIndex = -999;

    })

    document.addEventListener('DOMContentLoaded', function () {
        var urlParams = new URLSearchParams(window.location.search);
        var categorySearch = urlParams.get('categorySearch');

        document.getElementById('categorySearch').value = categorySearch;

        var categoryItems = document.querySelectorAll('.category-item');

        categoryItems.forEach(function (item) {
            if (item.getAttribute('data-value') === categorySearch) {
                item.classList.add('selected');
            }
        });
    });

    var buttons = document.querySelectorAll(".accordion-button");

    buttons.forEach(function (button) {
        button.addEventListener("click", function () {
            if (this.classList.contains("collapsed")) {
                this.parentElement.classList.toggle("no-hover");
            } else {
                this.parentElement.classList.remove("no-hover");
            }


        });

    });

    var urlParams = new URLSearchParams(window.location.search);
    var categorySearch = urlParams.get('category');
    var searchParam = urlParams.get('search');

    if (document.getElementById("searchValue")) {
        document.getElementById("searchValue").value = searchParam;

    }
    if (document.getElementById("categorySearch")) {
        document.getElementById("categorySearch").value = categorySearch;
    }
   

    if (categorySearch) {
        var categoryItems = document.querySelectorAll('.category-item');
        if (categorySearch) {
            categoryItems.forEach(function (item) {
                if (item.getAttribute('data-value') === categorySearch) {
                    item.classList.add('selected');
                }
            });
        }
        
    }

})

