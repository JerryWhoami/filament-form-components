let mix = require("laravel-mix");

mix.setPublicPath("public");
mix.setResourceRoot("jsoneditor");
mix.sourceMaps();
mix.version();

mix
  .copy(
    [
      "node_modules/jsoneditor/dist/jsoneditor.min.css",
      "node_modules/jsoneditor/dist/jsoneditor.min.js",
    ],
    "public/jsoneditor",
  )
  .copyDirectory("node_modules/jsoneditor/dist/img", "public/jsoneditor/img");
