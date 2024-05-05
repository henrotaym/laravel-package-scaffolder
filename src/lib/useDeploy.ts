#!/usr/bin/env node

import {
  useConfirm,
  useCurrentPath,
  useGenerator,
  useDisplayJson,
  usePackageStubsPath,
  usePrompt,
  useSentence,
  useLastFolderName,
} from "@henrotaym/scaffolding-utils";

const useKebabToCamel = (text: string) =>
  text.replace(/(^\w|-\w)/g, (t: string) => t.replace(/-/, "").toUpperCase());

const useStubsPath = usePackageStubsPath(
  "@henrotaym/laravel-package-scaffolder"
);

const useCancelSentence = () => useSentence("Scaffolding was cancelled ❌");

const useScaffolding = () => {
  useSentence("Hi there 👋");
  useSentence("Let's scaffold a new laravel package 🎉");

  const folder = usePrompt("Folder location [.]", ".");
  const location = useCurrentPath(folder);
  const defaultPackageName = useLastFolderName(location);
  const slugPackageName = usePrompt(
    `Package name [${defaultPackageName}]`,
    defaultPackageName
  );
  const packageName = useKebabToCamel(slugPackageName);
  const description = usePrompt(
    `Package description [${slugPackageName}]`,
    slugPackageName
  );
  const slugOrganizationName = usePrompt(
    "Github organization [deegitalbe]",
    "deegitalbe"
  );
  const organizationName = useKebabToCamel(slugOrganizationName);

  const displayedData = {
    location,
    namespace: `${organizationName}\\${packageName}`,
    name: `${slugOrganizationName}/${slugPackageName}`,
    description,
  };

  useDisplayJson(displayedData);

  const isConfirmed = useConfirm("Is it correct ? ");

  if (!isConfirmed) {
    useCancelSentence();
    useSentence("Come back when you're ready 😎");
    return;
  }

  const generatorData = {
    organizationName,
    packageName,
    slugPackageName,
    slugOrganizationName,
    description,
  };
  const generator = useGenerator(generatorData);

  generator.copy(useStubsPath(), location);

  useSentence("Successfully scaffolded package 🎉");
  useSentence("You're good to go 🥳");
  useSentence(`- ./cli bootstrap && ./cli test`);
};

export default useScaffolding;
