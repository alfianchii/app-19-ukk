import { handleClick } from "../../index";

document.documentElement.addEventListener("click", function (event) {
    const unique = event.target.dataset.unique ?? "";

    // Destroy
    if (event.target && event.target.matches("[data-confirm-user-destroy]"))
        handleClick({
            data: { unique },
            event: {
                noun: "user",
                verb: "non-active",
                method: "DELETE",
            },
            uri: "/dashboard/users",
            redirect: "/dashboard/users",
        });

    // Activate
    if (event.target && event.target.matches("[data-confirm-user-activate]"))
        handleClick({
            data: { unique },
            event: {
                noun: "user",
                verb: "activate",
                method: "PUT",
            },
            uri: "/dashboard/users/activate",
            redirect: "/dashboard/users",
        });
});
