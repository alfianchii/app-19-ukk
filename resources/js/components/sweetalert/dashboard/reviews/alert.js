import { handleClick } from "../../index";

document.documentElement.addEventListener("click", function (event) {
    const unique = event.target.dataset.unique ?? "";

    // Destroy
    if (event.target && event.target.matches("[data-confirm-review-destroy]"))
        handleClick({
            data: { unique },
            event: {
                noun: "book review",
                verb: "remove",
                method: "DELETE",
            },
            uri: "/dashboard/reviews",
            redirect: "/dashboard/reviews",
        });
});
