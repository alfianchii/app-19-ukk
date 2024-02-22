import { handleClick } from "../../index";

document.documentElement.addEventListener("click", function (event) {
    const unique = event.target.dataset.unique ?? "";

    // Destroy
    if (event.target && event.target.matches("[data-confirm-genre-destroy]"))
        handleClick({
            data: { unique },
            event: {
                noun: "genre",
                verb: "delete",
                method: "DELETE",
            },
            uri: "/dashboard/genres",
            redirect: "/dashboard/genres",
        });
});
