import { defineConfig, loadEnv } from "vite";
import laravel from "laravel-vite-plugin";
import { readFileSync } from "fs";

export default defineConfig(({ command, mode }) => {
    const env = loadEnv(mode, process.cwd(), "");
    const isProduction = mode === "production";
    const host = env.SERVER_HOST;

    console.log("Modo: " + mode);
    console.log("App URl: " + env.APP_URL);
    console.log("Serve: " + env.SERVER_HOST);

    return {
        plugins: [
            laravel({
                input: ["resources/css/app.css", "resources/js/app.js"],
                refresh: true,
            }),
        ],

        server: isProduction
            ? false
            : {
                  host,
                  port: 5174,
                  hmr: { host },
                  https: {
                      key: readFileSync(env.SERVER_HTTPS_KEY),
                      cert: readFileSync(env.SERVER_HTTPS_CERT),
                  },
              },
    };
});
