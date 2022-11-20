const limit_str = (str, l = 10) => {
    if (str.length > l) {
      return `${str.slice(0, l)}...`;
    }
    return str;
};

export {limit_str}