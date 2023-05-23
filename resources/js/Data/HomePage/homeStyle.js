const styles = {
  boxWidth: "hxl:max-w-[1280px] w-full",

  heading2: "font-poppins font-semibold hxs:text-[48px] text-[40px] text-white hxs:leading-[76.8px] leading-[66.8px] w-full",
  paragraph: "font-poppins font-normal text-dimWhite text-[18px] leading-[30.8px]",

  flexCenter: "flex justify-center items-center",
  flexStart: "flex justify-center items-start",

  paddingX: "hsm:px-16 px-6",
  paddingY: "hsm:py-16 py-6",
  padding: "hsm:px-16 px-6 hsm:py-12 py-4",

  marginX: "hsm:mx-16 mx-6",
  marginY: "hsm:my-16 my-6",
};

export const layout = {
  section: `flex hmd:flex-row flex-col ${styles.paddingY}`,
  sectionReverse: `flex hmd:flex-row flex-col-reverse ${styles.paddingY}`,

  sectionImgReverse: `flex-1 flex ${styles.flexCenter} hmd:mr-10 mr-0 hmd:mt-0 mt-10 relative`,
  sectionImg: `flex-1 flex ${styles.flexCenter} hmd:ml-10 ml-0 hmd:mt-0 mt-10 relative`,

  sectionInfo: `flex-1 ${styles.flexStart} flex-col`,
};

export default styles;
