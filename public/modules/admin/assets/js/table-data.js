$((function (e) {
    (s = $("#example").DataTable({
        lengthChange: !1,
        buttons: ["copy", "excel", "pdf", "colvis"],
        responsive: !0,
        language: {searchPlaceholder: "جستجو کردن...", sSearch: "", lengthMenu: "_MENU_ ", scrollX: "100%"}
    })).buttons().container().appendTo("#example_wrapper .col-md-6:eq(0)"),

        $("#example1").DataTable({
            paginate: false,
            info: false,
            language: {
                searchPlaceholder: "جستجو کردن...",
                sSearch: "",
                lengthMenu: "_MENU_",
                scrollX: "100%"
            }
        }),
        $("#example2").DataTable({
        language: {
            searchPlaceholder: "جستجو کردن...",
            sSearch: "",
            lengthMenu: "_MENU_",
            scrollX: "100%"
        }
    });

    var a, l, r, s = $("#example-delete").DataTable({
        language: {
            searchPlaceholder: "جستجو کردن...",
            sSearch: "",
            lengthMenu: "_MENU_",
            scrollX: "100%"
        }
    });
    $("#example-delete tbody").on("click", "tr", (function () {
        $(this).hasClass("selected") ? $(this).removeClass("selected") : (s.$("tr.selected").removeClass("selected"), $(this).addClass("selected"))
    })), $("#button").click((function () {
        s.row(".selected").remove().draw(!1)
    })), $("#example-1").DataTable((a = {
        responsive: !0,
        language: {searchPlaceholder: "جستجو کردن...", sSearch: "", lengthMenu: "_MENU_", scrollX: "100%"}
    }, l = "responsive", r = {
        details: {
            display: $.fn.dataTable.Responsive.display.modal({
                header: function (e) {
                    var a = e.data();
                    return "Details for " + a[0] + " " + a[1]
                }
            }), renderer: $.fn.dataTable.Responsive.renderer.tableAll({tableClass: "table border mb-0"})
        }
    }, l in a ? Object.defineProperty(a, l, {value: r, enumerable: !0, configurable: !0, writable: !0}) : a[l] = r, a))
}));